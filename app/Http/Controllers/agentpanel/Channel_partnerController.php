<?php

namespace App\Http\Controllers\agencypanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Channel_partner;
use App\Models\Agency;
use Validator;
use Illuminate\Pagination\Paginator;

class Channel_partnerController extends Controller
{
    private $pagination = 20;

    public function manage() {
        $data = Channel_partner::where("agenc_id", "=", Auth::id())->paginate($this->pagination);
        return view('agencypanel.managechannel_partner', compact('data'));
    }
    
    public function search(Request $request) {
        $input = $request->all();
        $qry = Channel_partner::query(); 
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
        return view('agencypanel.managechannel_partner', compact('data'));
    }
    
    public function add() {
        $data = array('type'=>'add', 'agenc_id'=>Auth::id());        
        return view('agencypanel.addchannel_partner', compact('data'));
    }
    
    public function save(Request $request) {
        $input = $request->all();
       
        $validator = Validator::make( $input, $this->getRules('Add', $input), $this->messages());
        if ($validator->fails()) { 
            
            $data = array('type'=>'add', 'input'=>$input, 'agenc_id'=>Auth::id(), 'error'=>$validator->messages());
            return view('agencypanel.addchannel_partner', compact('data'));
            exit();            
        }
        $input['password'] = bcrypt($input['password']);
        if(isset($input["photo"])) {
            $photo = $input["photo"];
            $filename = rand(0000,9999).$photo->getClientOriginalName();
            $upload_dir_path = public_path()."\uploads\channel_partner";
            $photo->move($upload_dir_path, $filename );
            $input['photo'] = $filename;
        }
        
        $agency = Channel_partner::create($input);
        if($agency->id>0) {
            return redirect()->route('agencypanel.channel_partner.manage')->with('success', 'Created successfully.');
        } else {
            return redirect()->route('agencypanel.channel_partner.add')->withErrors(['Error creating record. Please try again.']);
        }
    }
    
    public function edit($id) {

        $input = Channel_partner::where('id', '=', $id)->get();
        $data = array('type'=>'edit', 'input'=>$input, 'agenc_id'=>Auth::id());
	    return view('agencypanel.addchannel_partner', compact('data'));
	}
    
    public function update(Request $request) {
		$input = $request->all();
        $id = $input['id'];
        $validator = Validator::make( $input, $this->getRules('Edit', $input), $this->messages()); 
        
        if ($validator->fails()) { 
            
            $data = array('type'=>'Edit', 'input'=>$input, 'agenc_id'=>Auth::id(), 'error'=>$validator->messages());
            return view('agencypanel.addchannel_partner', compact('data'));
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
        $update["agenc_id"] = $input['agenc_id'];
        $update["status"] = $input['status'];
        if(isset($input["photo"])) 
        {
        	$upload_dir_path = public_path()."/uploads/channel_partner";
        	$this->removeimage($upload_dir_path, $id);
        	
            $photo = $input["photo"];
            $filename = rand(0000,9999).$photo->getClientOriginalName();
            $upload_dir_path = public_path()."\uploads\channel_partner";
            $photo->move($upload_dir_path, $filename );
            $update['photo'] = $filename;
        }
        $agent = Channel_partner::where('id', '=', $id)->update($update);
        return redirect()->route('agencypanel.channel_partner.manage')->with('success', 'Updated successfully.');

	}
	
	public function delete($id) {
        $upload_dir_path = public_path()."/uploads/channel_partner";
        $this->removeimage($upload_dir_path, $id);
        
        Channel_partner::where('id','=',$id)->delete();
        
        
        
        return redirect()->route('agencypanel.channel_partner.manage')->with('success', 'Deleted successfully.');
    }
    
    private function removeimage($imagepath, $id) {
        $user = Channel_partner::where('id', '=', $id)->get();
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
        $return['agenc_id'] = 'required';
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
            'agenc_id.required'  => $this->getRequiredMessage('agency'),            
        ];
    }

    private function getRequiredMessage($string) {
        return 'The ' . $string . ' field is required.';
    }

    private function getGreaterMessage($string, $maxchar) {
        return 'The ' . $string . ' may not be greater than ' . $maxchar . ' characters.';
    }
    
    
}
