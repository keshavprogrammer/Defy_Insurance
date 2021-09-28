<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Validator;
use Illuminate\Pagination\Paginator;

class SettingController extends Controller
{
     public function getsetting($id) {
    	$pagedata = Admin::where('id', '=', $id)->get();
	    $data = array('type'=>'edit', 'pagedata'=>$pagedata);
	    
	    
	    
	    return view('adminpanel.setting', compact('data'));
    }

    public function updatesetting(Request $request) {
    	$input = $request->all();
        $id = $input['id'];
        $validator = Validator::make( $input, $this->getRules('Edit', $input)); 
        
        if ($validator->fails()) { 
            $data = array('type'=>'Edit', 'pagedata'=>$input, 'error'=>$validator->messages());
            return view('adminpanel.setting', compact('data'));
            exit();            
        }
        $update = array();
        
        $update["name"] = $input['name'];
        $update["username"] = $input['username'];
        if($input['password']!="") {
            $update["password"] = bcrypt($input['password']);
        }
        $update["email"] = $input['email'];
        
        $user = Admin::where('id', '=', $id)->update($update);
        return redirect('/adminpanel/setting/'.$id)->with('success', 'Updated Successfully');
    }

    private function getRules($type, $input) {
        $return = array();
        $return['name'] = 'required';
        $return['username'] = 'required';
        $return['email'] = 'required';
        return $return;
    }
     
}
