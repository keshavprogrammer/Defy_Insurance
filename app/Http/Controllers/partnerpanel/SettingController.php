<?php

namespace App\Http\Controllers\partnerpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Channel_partner;
use App\Models\Agent;
use App\Models\Theme;
use Validator;
use Illuminate\Pagination\Paginator;

class SettingController extends Controller
{
     public function getsetting() {     	
    	$pagedata = Channel_partner::where("id", "=", Auth::id())->get();
    	
	    $data = array('type'=>'edit', 'pagedata'=>$pagedata);
	    return view('partnerpanel.setting', compact('data'));
    }

    public function updatesetting(Request $request) {
        $input = $request->all();
        $id = Auth::id();
        $validator = Validator::make( $input, $this->getRules('Edit', $input), $this->messages()); 
        
        if ($validator->fails()) {             
            $data = array('type'=>'Edit', 'pagedata'=>$input, 'error'=>$validator->messages());
            return view('partnerpanel.setting', compact('data'));
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
        $agency = Channel_partner::where('id', '=', $id)->update($update);
        return redirect('/partnerpanel/setting/')->with('success', 'Updated Successfully');
        
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
            
        ];
    }

    private function getRequiredMessage($string) {
        return 'The ' . $string . ' field is required.';
    }

    private function getGreaterMessage($string, $maxchar) {
        return 'The ' . $string . ' may not be greater than ' . $maxchar . ' characters.';
    }
     
}
