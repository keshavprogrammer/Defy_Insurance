<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Validator;


class FaqController extends Controller
{
    private $pagination = 20;

    public function manage() {
        $data = Faq::query()->paginate($this->pagination);
        return view('adminpanel.managefaq', compact('data'));
    }
    
    public function search(Request $request) {
        $input = $request->all();
        $qry = Faq::query(); 
        if(trim($input["search"])!="") {
            $search = $input["search"];
            $qry->where([
                ["question", "like", "%{$search}%"],
            ]);
            $qry->orwhere([
                ["description", "like", "%{$search}%"],
            ]);            
        }
        $data = $qry->paginate($this->pagination);
        $data->appends($input);
        return view('adminpanel.managefaq', compact('data'));
    }
    
    public function add() {
        
        $data = array('type'=>'add');        
        return view('adminpanel.addfaq', compact('data'));
    }
    
    public function save(Request $request) {
        $input = $request->all();
       
        $validator = Validator::make( $input, $this->getRules('Add', $input), $this->messages());
        if ($validator->fails()) {             
            $data = array('type'=>'add', 'input'=>$input, 'error'=>$validator->messages());
            return view('adminpanel.addfaq', compact('data'));
            exit();            
        }
        
        $agency = Faq::create($input);
        if($agency->id>0) {
            return redirect()->route('adminpanel.faq.manage')->with('success', 'Created successfully.');
        } else {
            return redirect()->route('adminpanel.faq.add')->withErrors(['Error creating record. Please try again.']);
        }
    }
    
    public function edit($id) {
        
        $input = Faq::where('id', '=', $id)->get();
        $data = array('type'=>'edit', 'input'=>$input);
        
	    return view('adminpanel.addfaq', compact('data'));
	}
    
    public function update(Request $request) {
		$input = $request->all();
        $id = $input['id'];
        $validator = Validator::make( $input, $this->getRules('Edit', $input), $this->messages()); 
        
        if ($validator->fails()) { 
            
            $data = array('type'=>'Edit', 'input'=>$input, 'error'=>$validator->messages());
            return view('adminpanel.addfaq', compact('data'));
            exit();            
        }
        $update = array();
        $update["question"] = $input['question'];
        $update["description"] = $input['description'];
        $update["status"] = $input['status'];        
        $agent = Faq::where('id', '=', $id)->update($update);
        return redirect()->route('adminpanel.faq.manage')->with('success', 'Updated successfully.');

	}
    
    public function delete($id) {
        Faq::where('id','=',$id)->delete();
        
        return redirect()->route('adminpanel.faq.manage')->with('success', 'Deleted successfully.');
    }
    
    
    
    
    
    private function getRules($type, $input) {
        $return = array();
        $return['question'] = 'required|max:500';
        $return['description'] = 'required';
        
        if($type=="Edit") {
            
        } else {
            
        }
        return $return;
    }

    private function messages() {
        return [
            'question.required'  => $this->getRequiredMessage('question'),
            'question.max'  => $this->getGreaterMessage('question', 500),                        
            'description.required'  => $this->getRequiredMessage('description'),            
        ];
    }

    private function getRequiredMessage($string) {
        return 'The ' . $string . ' field is required.';
    }

    private function getGreaterMessage($string, $maxchar) {
        return 'The ' . $string . ' may not be greater than ' . $maxchar . ' characters.';
    }
}
