<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogcategorie;
use Validator;

class BlogcategorieController extends Controller
{
    private $pagination = 20;

    public function manage() {
        $data = Blogcategorie::query()->paginate($this->pagination);
        return view('adminpanel.manageblogcategorie', compact('data'));
    }
    
    public function search(Request $request) {
        $input = $request->all();
        $qry = Blogcategorie::query(); 
        if(trim($input["search"])!="") {
            $search = $input["search"];
            $qry->where([
                ["category_title", "like", "%{$search}%"],
            ]);
        }
        $data = $qry->paginate($this->pagination);
        $data->appends($input);
        return view('adminpanel.manageblogcategorie', compact('data'));
    }
    
    public function add() {
        
        $data = array('type'=>'add');        
        return view('adminpanel.addblogcategorie', compact('data'));
    }
    
    public function save(Request $request) {
        $input = $request->all();
       
        $validator = Validator::make( $input, $this->getRules('Add', $input), $this->messages());
        if ($validator->fails()) {             
            $data = array('type'=>'add', 'input'=>$input, 'error'=>$validator->messages());
            return view('adminpanel.addblogcategorie', compact('data'));
            exit();            
        }
        
        $agency = Blogcategorie::create($input);
        if($agency->id>0) {
            return redirect()->route('adminpanel.blogcategorie.manage')->with('success', 'Created successfully.');
        } else {
            return redirect()->route('adminpanel.blogcategorie.add')->withErrors(['Error creating record. Please try again.']);
        }
    }
    
    public function edit($id) {
        
        $input = Blogcategorie::where('id', '=', $id)->get();
        $data = array('type'=>'edit', 'input'=>$input);
        
	    return view('adminpanel.addblogcategorie', compact('data'));
	}
    
    public function update(Request $request) {
		$input = $request->all();
        $id = $input['id'];
        $validator = Validator::make( $input, $this->getRules('Edit', $input), $this->messages()); 
        
        if ($validator->fails()) { 
            
            $data = array('type'=>'Edit', 'input'=>$input, 'error'=>$validator->messages());
            return view('adminpanel.addblogcategorie', compact('data'));
            exit();            
        }
        $update = array();
        $update["category_title"] = $input['category_title'];
        $update["status"] = $input['status'];        
        $agent = Blogcategorie::where('id', '=', $id)->update($update);
        return redirect()->route('adminpanel.blogcategorie.manage')->with('success', 'Updated successfully.');

	}
    
    public function delete($id) {
        Blogcategorie::where('id','=',$id)->delete();
        
        return redirect()->route('adminpanel.blogcategorie.manage')->with('success', 'Deleted successfully.');
    }
    
    private function getRules($type, $input) {
        $return = array();
        $return['category_title'] = 'required|max:50';
        
        
        if($type=="Edit") {
            
        } else {
            
        }
        return $return;
    }

    private function messages() {
        return [
            'category_title.required'  => $this->getRequiredMessage('category title'),
            'category_title.max'  => $this->getGreaterMessage('category title', 50),        
        ];
    }

    private function getRequiredMessage($string) {
        return 'The ' . $string . ' field is required.';
    }

    private function getGreaterMessage($string, $maxchar) {
        return 'The ' . $string . ' may not be greater than ' . $maxchar . ' characters.';
    }
    
}
