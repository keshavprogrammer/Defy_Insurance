<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policyplan;
use App\Models\Policytype;
use Validator;
class PolicyplansController extends Controller
{
    private $pagination = 20;

    public function manage() {
        $data = Policyplan::query()->paginate($this->pagination);
        return view('adminpanel.managepolicyplan', compact('data'));
    }
    
    public function search(Request $request) {
        $input = $request->all();
        $qry = Policyplan::query(); 
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
        return view('adminpanel.managepolicyplan', compact('data'));
    }
    
    public function add() {
        
        $policytype = Policytype::where("status", "=", "1")->pluck('policy_type_title', 'id');
        $data = array('type'=>'add', 'policytype'=>$policytype);        
        return view('adminpanel.addpolicyplan', compact('data'));
    }
    
    public function save(Request $request) {
        $input = $request->all();
       
        $validator = Validator::make( $input, $this->getRules('Add', $input), $this->messages());
        if ($validator->fails()) {
        	$policytype = Policytype::where("status", "=", "1")->pluck('policy_type_title', 'id');
            $data = array('type'=>'add', 'input'=>$input, 'policytype'=>$policytype, 'error'=>$validator->messages());
            return view('adminpanel.addpolicyplan', compact('data'));
            exit();            
        }
        
        if(isset($input["logo"])) {
            $logo = $input["logo"];
            $filename = rand(0000,9999).$logo->getClientOriginalName();
            $upload_dir_path = public_path()."\uploads\policyplan_logo";
            $logo->move($upload_dir_path, $filename );
            $input['logo'] = $filename;
        }
        
        $agency = Policyplan::create($input);
        if($agency->id>0) {
            return redirect()->route('adminpanel.policyplan.manage')->with('success', 'Created successfully.');
        } else {
            return redirect()->route('adminpanel.policyplan.add')->withErrors(['Error creating record. Please try again.']);
        }
    }
    
    
    
    public function edit($id) {
        
        $policytype = Policytype::where("status", "=", "1")->pluck('policy_type_title', 'id');
        $input = Policyplan::where('id', '=', $id)->get();
        $data = array('type'=>'edit', 'input'=>$input, 'policytype'=>$policytype);        
	    return view('adminpanel.addpolicyplan', compact('data'));
	}
    
    public function update(Request $request) {
		$input = $request->all();
        $id = $input['id'];
        $validator = Validator::make( $input, $this->getRules('Edit', $input), $this->messages()); 
        
        if ($validator->fails()) { 
            
            $policytype = Policytype::where("status", "=", "1")->pluck('policy_type_title', 'id');
            $data = array('type'=>'Edit', 'input'=>$input, 'policytype'=>$policytype, 'error'=>$validator->messages());
            return view('adminpanel.addpolicyplan', compact('data'));
            exit();            
        }
        $update = array();
        $update["title"] = $input['title'];
        $update["description"] = $input['description'];
        $update["published_date"] = $input['published_date'];        
        $update["policy_type_id"] = $input['policy_type_id'];
        $update["status"] = $input['status'];
        if(isset($input["logo"])) 
        {
        	$upload_dir_path = public_path()."/uploads/policyplan_logo";
        	$this->removeimage($upload_dir_path, $id);
        	
            $logo = $input["logo"];
            $filename = rand(0000,9999).$logo->getClientOriginalName();
            $upload_dir_path = public_path()."\uploads\policyplan_logo";
            $logo->move($upload_dir_path, $filename );
            $update['logo'] = $filename;
        }
        $agent = Policyplan::where('id', '=', $id)->update($update);
        return redirect()->route('adminpanel.policyplan.manage')->with('success', 'Updated successfully.');

	}
    
    
    
    
    
    public function delete($id) {
        $upload_dir_path = public_path()."/uploads/policyplan_logo";
        $this->removeimage($upload_dir_path, $id);
        
        Policyplan::where('id','=',$id)->delete();
        
        return redirect()->route('adminpanel.policyplan.manage')->with('success', 'Deleted successfully.');
    }
    
   
    
    private function removeimage($imagepath, $id) {
        $user = Policyplan::where('id', '=', $id)->get();
        if($user[0]->logo!=null && $user[0]->logo!="") {
            if(file_exists($imagepath.'/'.$user[0]->logo)) {
                unlink($imagepath.'/'.$user[0]->logo);
            }
        }
        return true;
    }
    
    private function getRules($type, $input) {
        $return = array();
        $return['policy_type_id'] = 'required';
        $return['title'] = 'required|max:30';
        $return['published_date'] = 'required';
        
        
        if($type=="Edit") {
            
        } else {
            
        }
        return $return;
    }

    private function messages() {
        return [
            'policy_type_id.required'  => $this->getRequiredMessage('policy type'),
            'title.required'  => $this->getRequiredMessage('title'),
            'title.max'  => $this->getGreaterMessage('title', 30),                        
            'published_date.required'  => $this->getRequiredMessage('published date'),            
        ];
    }

    private function getRequiredMessage($string) {
        return 'The ' . $string . ' field is required.';
    }

    private function getGreaterMessage($string, $maxchar) {
        return 'The ' . $string . ' may not be greater than ' . $maxchar . ' characters.';
    }
    
}
