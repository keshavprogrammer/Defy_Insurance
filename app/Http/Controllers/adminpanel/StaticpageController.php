<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staticpage;
use Validator;

class StaticpageController extends Controller
{
    public function getpage($id) {
    	$pagedata = Staticpage::where('id', '=', $id)->get();
	    $data = array('type'=>'edit', 'pagedata'=>$pagedata);
	    return view('adminpanel.staticpage', compact('data'));
    }

    public function updatepage(Request $request) {
    	$input = $request->all();
        $id = $input['id'];
        $validator = Validator::make( $input, $this->getRules('Edit', $input)); 
        
        if ($validator->fails()) { 
            $data = array('type'=>'Edit', 'pagedata'=>$input, 'error'=>$validator->messages());
            return view('adminpanel.staticpage', compact('data'));
            exit();            
        }
        $update = array();
        if(isset($input["picture"])) {
            $imagePath = $input["picture"];
            $filename = rand(0000,9999).$imagePath->getClientOriginalName();
            $upload_dir_path = public_path()."\uploads\staticpage_images";
            $imagePath->move($upload_dir_path, $filename );
            $result = $this->removeimage($upload_dir_path, $id);
            $update['picture'] = $filename;
        }
        $update["page_title"] = $input['page_title'];
        $update["short_description"] = $input['short_description'];
        $update["description"] = $input['description'];
        $user = Staticpage::where('id', '=', $id)->update($update);
        return redirect('/adminpanel/staticpages/'.$id)->with('success', 'Updated Successfully');
    }

    private function getRules($type, $input) {
        $return = array();
        if(isset($input["picture"])) {
            $return['picture'] = 'mimes:jpeg,png,jpg|max:2048';
        }
        $return['page_title'] = 'required';
        return $return;
    }

    private function removeimage($imagepath, $id) {
        $user = Staticpage::where('id', '=', $id)->get();
        if($user[0]->picture!=null && $user[0]->picture!="") {
            if(file_exists($imagepath.'\\'.$user[0]->picture)) {
                unlink($imagepath.'\\'.$user[0]->picture);
            }
        }
        return true;
    }
}
