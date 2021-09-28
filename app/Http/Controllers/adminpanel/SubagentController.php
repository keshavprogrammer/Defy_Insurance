<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subagent;
use App\Models\Agent;
use App\Models\Agency;
use Validator;
use Illuminate\Pagination\Paginator;

class SubagentController extends Controller
{
    private $pagination = 20;

    public function manage() {
        $data = Subagent::query()->paginate($this->pagination);
        return view('adminpanel.managesubagent', compact('data'));
    }
    
    public function search(Request $request) {
        $input = $request->all();
        $qry = Subagent::query(); 
        if(trim($input["search"])!="") {
            $search = $input["search"];
            $qry->where([
                ["name", "like", "%{$search}%"],
            ]);
            $qry->orwhere([
                ["email", "like", "%{$search}%"],
            ]);
            $qry->orwhere([
                ["phone", "like", "%{$search}%"],
            ]);
        }
        $data = $qry->paginate($this->pagination);
        $data->appends($input);
        return view('adminpanel.manageagency', compact('data'));
    }
    
    public function add() {
        $agency = Agency::where("status", "=", "1")->pluck('name', 'id');
        $agent = Agent::where("status", "=", "1")->pluck('name', 'id');
        $data = array('type'=>'add', 'agency'=>$agency, 'agent'=>$agent);        
        return view('adminpanel.addsubagent', compact('data'));
    }
    
    public function save(Request $request) {
        $input = $request->all();
       
        $validator = Validator::make( $input, $this->getRules('Add', $input), $this->messages());
        if ($validator->fails()) { 
            $agency = Agency::where("status", "=", "1")->pluck('name', 'id');
            $agent = Agent::where("status", "=", "1")->pluck('name', 'id');
            $data = array('type'=>'add', 'input'=>$input, 'agency'=>$agency, 'agent'=>$agent, 'error'=>$validator->messages());
            return view('adminpanel.addsubagent', compact('data'));
            exit();            
        }
        $input['password'] = bcrypt($input['password']);
        if(isset($input["photo"])) {
            $photo = $input["photo"];
            $filename = rand(0000,9999).$photo->getClientOriginalName();
            $upload_dir_path = public_path()."\uploads\subagent_logo";
            $photo->move($upload_dir_path, $filename );
            $input['photo'] = $filename;
        }
        
        $agency = Subagent::create($input);
        if($agency->id>0) {
            return redirect()->route('adminpanel.subagent.manage')->with('success', 'Created successfully.');
        } else {
            return redirect()->route('adminpanel.subagent.add')->withErrors(['Error creating record. Please try again.']);
        }
    }
    
    public function edit($id) {
        $agency = Agency::where("status", "=", "1")->pluck('name', 'id');
        $agent = Agent::where("status", "=", "1")->pluck('name', 'id');
        $input = Subagent::where('id', '=', $id)->get();
        $data = array('type'=>'edit', 'input'=>$input, 'agency'=>$agency, 'agent'=>$agent);
        
	    return view('adminpanel.addsubagent', compact('data'));
	}
    
    public function update(Request $request) {
		$input = $request->all();
        $id = $input['id'];
        $validator = Validator::make( $input, $this->getRules('Edit', $input), $this->messages()); 
        
        if ($validator->fails()) { 
            $agency = Agency::where("status", "=", "1")->pluck('name', 'id');
            $agent = Agent::where("status", "=", "1")->pluck('name', 'id');
            $data = array('type'=>'Edit', 'input'=>$input, 'agency'=>$agency, 'agent'=>$agent, 'error'=>$validator->messages());
            return view('adminpanel.addsubagent', compact('data'));
            exit();            
        }
        $update = array();
        $update["name"] = $input['name'];
        $update["email"] = $input['email'];
        if($input['password']!="") {
            $update["password"] = bcrypt($input['password']);
        }
        $update["phone"] = $input['phone'];
        $update["address"] = $input['address'];
        $update["city"] = $input['city'];
        $update["state"] = $input['state'];
        $update["zip"] = $input['zip'];
        $update["country"] = $input['country'];
        $update["birth_date"] = $input['birth_date'];
        $update["join_date"] = $input['join_date'];
        $update["agenc_id"] = $input['agenc_id'];
        $update["agent_id"] = $input['agent_id'];
        $update["status"] = $input['status'];
        if(isset($input["photo"])) 
        {
        	$upload_dir_path = public_path()."/uploads/subagent_logo";
        	$this->removeimage($upload_dir_path, $id);
        	
            $photo = $input["photo"];
            $filename = rand(0000,9999).$photo->getClientOriginalName();
            $upload_dir_path = public_path()."\uploads\subagent_logo";
            $photo->move($upload_dir_path, $filename );
            $update['photo'] = $filename;
        }
        $agent = Subagent::where('id', '=', $id)->update($update);
        return redirect()->route('adminpanel.subagent.manage')->with('success', 'Updated successfully.');

	}
    
    public function delete($id) {
        $upload_dir_path = public_path()."/uploads/subagent_logo";
        $this->removeimage($upload_dir_path, $id);
        
        Subagent::where('id','=',$id)->delete();
        return redirect()->route('adminpanel.subagent.manage')->with('success', 'Deleted successfully.');
    }
    
    public function ajaxGetAgentByAgencyId(Request $request) {
        $input = $request->all();
        $data = Agent::where("agenc_id", "=",  $input['id'])->pluck('name', 'id');
        return response()->json($data);
    }

    public function subagentsinglesms(Request $request) {
        $input = $request->all();
        $subagntId = $input['receiverid'];
        $message = $input['msg'];

        $account_sid = env("TWILIO_SID");
        $auth_token = env("TWILIO_AUTH_TOKEN");
        $twilio_number = env("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);

        $subagentData = Subagent::query()->where('id', '=', $subagntId)->get();
        $phone_number = $subagentData[0]->phone;

        $sentResponse = $client->messages->create($phone_number, 
            ['from' => $twilio_number, 'body' => $message] );
        
        if($sentResponse->sid != ''){
            $sms['sender_id'] = Auth::id();
            $sms['receiver_id'] = $agntId;
            $sms['sender_type'] = 'Admin';
            $sms['receiver_type'] = 'Sub Agent';
            $sms['sms_type'] = 'Single';
            $sms['sms_content'] = $message;

            $agency = Sms_historie::create($sms);

            return redirect()->route('adminpanel.subagent.manage')->with('success', 'SMS sent successfully.');
        }
        else{
            return redirect()->route('adminpanel.subagent.manage')->withErrors(['SMS is not sent']);
        }
    }
   
    
    private function removeimage($imagepath, $id) {
        $user = Subagent::where('id', '=', $id)->get();
        if($user[0]->logo!=null && $user[0]->logo!="") {
            if(file_exists($imagepath.'/'.$user[0]->logo)) {
                unlink($imagepath.'/'.$user[0]->logo);
            }
        }
        return true;
    }
    
    private function getRules($type, $input) {
        $return = array();
        $return['name'] = 'required|max:30';        
        $return['phone'] = 'required|max:20';
        $return['address'] = 'required|max:200';
        $return['city'] = 'required|max:50';
        $return['state'] = 'required|max:50';
        $return['zip'] = 'required|max:10';
        $return['country'] = 'required|max:50';        
        $return['birth_date'] = 'required';
        $return['join_date'] = 'required';
        $return['agenc_id'] = 'required';
        $return['agent_id'] = 'required';
        if($type=="Edit") {
            $return['email'] = 'required|email|max:100';            
            if($input["password"]!="") {
                $return['password'] = 'min:6|max:20';
            }
        } else {
            $return['email'] = 'required|email|unique:agencies,email|max:100';            
            $return['password'] = 'required|min:6|max:20';
        }
        return $return;
    }

    private function messages() {
        return [
            'name.required'  => $this->getRequiredMessage('first name'),
            'name.max'  => $this->getGreaterMessage('first name', 30),            
            'phone.required'  => $this->getRequiredMessage('phone no.'),
            'phone.max'  => $this->getGreaterMessage('phone no.', 20),
            'address.required'  => $this->getRequiredMessage('address'),
            'address.max'  => $this->getGreaterMessage('address', 200),
            'agenc_id.required'  => $this->getRequiredMessage('agency'),
            'agent_id.required'  => $this->getRequiredMessage('agent'),
            'birth_date.required'  => $this->getRequiredMessage('birth date'),
            'join_date.required'  => $this->getRequiredMessage('join date'),
        ];
    }

    private function getRequiredMessage($string) {
        return 'The ' . $string . ' field is required.';
    }

    private function getGreaterMessage($string, $maxchar) {
        return 'The ' . $string . ' may not be greater than ' . $maxchar . ' characters.';
    }
    
}
