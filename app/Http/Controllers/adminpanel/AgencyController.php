<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\Theme;
use App\Models\Sms_historie;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Auth; 
use Validator;
use Illuminate\Pagination\Paginator;

class AgencyController extends Controller
{
     private $pagination = 20;

    public function manage() {
        $data = Agency::query()->paginate($this->pagination);
        return view('adminpanel.manageagency', compact('data'));
    }
    
    public function search(Request $request) {
        $input = $request->all();
        $qry = Agency::query(); 
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
        $theme = Theme::where("is_active", "=", "1")->pluck('name', 'id');
        $data = array('type'=>'add', 'theme'=>$theme);        
        return view('adminpanel.addagency', compact('data'));
    }
    
    public function save(Request $request) {
        $input = $request->all();
       
        $validator = Validator::make( $input, $this->getRules('Add', $input), $this->messages());
        if ($validator->fails()) { 
            $theme = Theme::where("is_active", "=", "1")->pluck('name', 'id');
            $data = array('type'=>'add', 'input'=>$input, 'theme'=>$theme, 'error'=>$validator->messages());
            return view('adminpanel.addagency', compact('data'));
            exit();            
        }
        $input['password'] = bcrypt($input['password']);
        if(isset($input["logo"])) {
            $logo = $input["logo"];
            $filename = rand(0000,9999).$logo->getClientOriginalName();
            $upload_dir_path = public_path()."\uploads\agency_logo";
            $logo->move($upload_dir_path, $filename );
            $input['logo'] = $filename;
        }
        
        $agency = Agency::create($input);
        if($agency->id>0) {
            return redirect()->route('adminpanel.agency.manage')->with('success', 'Created successfully.');
        } else {
            return redirect()->route('adminpanel.agency.add')->withErrors(['Error creating record. Please try again.']);
        }
    }
    
    public function edit($id) {
        $theme = Theme::where("is_active", "=", "1")->pluck('name', 'id');
        $input = Agency::where('id', '=', $id)->get();
        $data = array('type'=>'edit', 'input'=>$input, 'theme'=>$theme);
	    return view('adminpanel.addagency', compact('data'));
	}
	
	public function update(Request $request) {
		$input = $request->all();
        $id = $input['id'];
        $validator = Validator::make( $input, $this->getRules('Edit', $input), $this->messages()); 
        
        if ($validator->fails()) { 
            $theme = Theme::where("is_active", "=", "1")->pluck('name', 'id');
            $data = array('type'=>'Edit', 'input'=>$input, 'theme'=>$theme, 'error'=>$validator->messages());
            return view('adminpanel.addagency', compact('data'));
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
        $update["contact_name"] = $input['contact_name'];
        $update["contact_email"] = $input['contact_email'];
        $update["contact_phone"] = $input['contact_phone'];
        $update["theme_id"] = $input['theme_id'];
        $update["status"] = $input['status'];
        if(isset($input["logo"])) 
        {
        	$upload_dir_path = public_path()."/uploads/agency_logo";
        	$this->removeimage($upload_dir_path, $id);
        	
            $logo = $input["logo"];
            $filename = rand(0000,9999).$logo->getClientOriginalName();
            $upload_dir_path = public_path()."\uploads\agency_logo";
            $logo->move($upload_dir_path, $filename );
            $update['logo'] = $filename;
        }
        $agency = Agency::where('id', '=', $id)->update($update);
        return redirect()->route('adminpanel.agency.manage')->with('success', 'Updated successfully.');

	}
   
    public function delete($id) {
        Agency::where('id','=',$id)->delete();
        
        $upload_dir_path = public_path()."/uploads/agency_logo";
        $this->removeimage($upload_dir_path, $id);
        
        return redirect()->route('adminpanel.agency.manage')->with('success', 'Deleted successfully.');
    }

    public function agencysinglesms(Request $request) {
        $input = $request->all();
        $agencyId = $input['receiverid'];
        $message = $input['msg'];

        $account_sid = env("TWILIO_SID");
        $auth_token = env("TWILIO_AUTH_TOKEN");
        $twilio_number = env("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);

        $agencyData = Agency::query()->where('id', '=', $agencyId)->get();
        $phone_number = $agencyData[0]->phone;

        $sentResponse = $client->messages->create($phone_number, 
            ['from' => $twilio_number, 'body' => $message] );
        
        if($sentResponse->sid != ''){
            $sms['sender_id'] = Auth::id();
            $sms['receiver_id'] = $agencyId;
            $sms['sender_type'] = 'Admin';
            $sms['receiver_type'] = 'Agency';
            $sms['sms_type'] = 'Single';
            $sms['sms_content'] = $message;

            $agency = Sms_historie::create($sms);

            return redirect()->route('adminpanel.agency.manage')->with('success', 'SMS sent successfully.');
        }
        else{
            return redirect()->route('adminpanel.agency.manage')->withErrors(['SMS is not sent']);
        }
    }
    
    private function removeimage($imagepath, $id) {
        $user = Agency::where('id', '=', $id)->get();
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
        $return['contact_name'] = 'required|max:30';
        $return['contact_phone'] = 'required|max:20';
        $return['theme_id'] = 'required';
        if($type=="Edit") {
            $return['email'] = 'required|email|max:100';
            $return['contact_email'] = 'required|email|max:100';
            if($input["password"]!="") {
                $return['password'] = 'min:6|max:20';
            }
        } else {
            $return['email'] = 'required|email|unique:agencies,email|max:100';
            $return['contact_email'] = 'required|email|max:100';
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
            'theme_id.required'  => $this->getRequiredMessage('theme'),
        ];
    }

    private function getRequiredMessage($string) {
        return 'The ' . $string . ' field is required.';
    }

    private function getGreaterMessage($string, $maxchar) {
        return 'The ' . $string . ' may not be greater than ' . $maxchar . ' characters.';
    }
    
    
}
