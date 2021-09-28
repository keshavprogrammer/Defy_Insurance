<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blogcategorie;
use Validator;
use Illuminate\Pagination\Paginator;

class BlogController extends Controller
{
     private $pagination = 20;

    public function manage() {
        $data = Blog::query()->paginate($this->pagination);
        return view('adminpanel.manageblog', compact('data'));
    }
    
    public function search(Request $request) {
        $input = $request->all();
        $qry = Blog::query(); 
        if(trim($input["search"])!="") {
            $search = $input["search"];
            $qry->where([
                ["blog_title", "like", "%{$search}%"],
            ]);
            $qry->orwhere([
                ["tags", "like", "%{$search}%"],
            ]);
            $qry->orwhere([
                ["description", "like", "%{$search}%"],
            ]);
        }
        $data = $qry->paginate($this->pagination);
        $data->appends($input);
        return view('adminpanel.manageblog', compact('data'));
    }
    
    public function add() {
        $blog_cate = Blogcategorie::where("status", "=", "1")->pluck('category_title', 'id');
        $data = array('type'=>'add', 'blog_cate'=>$blog_cate);        
        return view('adminpanel.addblog', compact('data'));
    }
    
    public function save(Request $request) {
        $input = $request->all();
        
        
       
        $validator = Validator::make( $input, $this->getRules('Add', $input), $this->messages());
        if ($validator->fails()) { 
            $blog_cate = Blogcategorie::where("status", "=", "1")->pluck('category_title', 'id');
            $data = array('type'=>'add', 'input'=>$input, 'blog_cate'=>$blog_cate, 'error'=>$validator->messages());
            return view('adminpanel.addblog', compact('data'));
            exit();            
        }
        
        if(isset($input["blog_image"])) {
            $blog_image = $input["blog_image"];
            $filename = rand(0000,9999).$blog_image->getClientOriginalName();
            $upload_dir_path = public_path()."\uploads\blog_image";
            $blog_image->move($upload_dir_path, $filename );
            $input['blog_image'] = $filename;
        }
        
        $agency = Blog::create($input);
        if($agency->id>0) {
            return redirect()->route('adminpanel.blog.manage')->with('success', 'Created successfully.');
        } else {
            return redirect()->route('adminpanel.blog.add')->withErrors(['Error creating record. Please try again.']);
        }
    }
    
    public function edit($id) {
        $blog_cate = Blogcategorie::where("status", "=", "1")->pluck('category_title', 'id');
        $input = Blog::where('id', '=', $id)->get();
        $data = array('type'=>'edit', 'input'=>$input, 'blog_cate'=>$blog_cate,);
	    return view('adminpanel.addblog', compact('data'));
	}
	
	public function update(Request $request) {
		$input = $request->all();
        $id = $input['id'];
        $validator = Validator::make( $input, $this->getRules('Edit', $input), $this->messages()); 
        
        if ($validator->fails()) { 
            $blog_cate = Blogcategorie::where("status", "=", "1")->pluck('category_title', 'id');
            $data = array('type'=>'Edit', 'input'=>$input, 'blog_cate'=>$blog_cate, 'error'=>$validator->messages());
            return view('adminpanel.addblog', compact('data'));
            exit();            
        }
        $update = array();
        $update["cate_id"] = $input['cate_id'];
        $update["blog_title"] = $input['blog_title'];
        $update["description"] = $input['description'];
        $update["tags"] = $input['tags'];
        $update["is_publish"] = $input['is_publish'];       
        $update["status"] = $input['status'];
        if(isset($input["blog_image"])) 
        {
        	$upload_dir_path = public_path()."/uploads/blog_image";
        	$this->removeimage($upload_dir_path, $id);
        	
            $blog_image = $input["blog_image"];
            $filename = rand(0000,9999).$blog_image->getClientOriginalName();
            $upload_dir_path = public_path()."\uploads\blog_image";
            $blog_image->move($upload_dir_path, $filename );
            $update['blog_image'] = $filename;
        }
        $agent = Blog::where('id', '=', $id)->update($update);
        return redirect()->route('adminpanel.blog.manage')->with('success', 'Updated successfully.');

	}
    
    public function delete($id) {
        $upload_dir_path = public_path()."/uploads/blog_image";
        $this->removeimage($upload_dir_path, $id);        
        Blog::where('id','=',$id)->delete();        
        return redirect()->route('adminpanel.blog.manage')->with('success', 'Deleted successfully.');
    }
    
    private function removeimage($imagepath, $id) {
        $user = Blog::where('id', '=', $id)->get();
        if($user[0]->logo!=null && $user[0]->logo!="") {
            if(file_exists($imagepath.'/'.$user[0]->logo)) {
                unlink($imagepath.'/'.$user[0]->logo);
            }
        }
        return true;
    }
    
    private function getRules($type, $input) {
        $return = array();
        $return['cate_id'] = 'required';
        $return['blog_title'] = 'required|max:200';        
        if($type=="Edit") {
            
        } else {
            
        }
        return $return;
    }

    private function messages() {
        return [
            'cate_id.required'  => $this->getRequiredMessage('category'),
            'blog_title.required'  => $this->getRequiredMessage('phone no.'),
            'blog_title.max'  => $this->getGreaterMessage('blog title', 200),
        ];
    }

    private function getRequiredMessage($string) {
        return 'The ' . $string . ' field is required.';
    }

    private function getGreaterMessage($string, $maxchar) {
        return 'The ' . $string . ' may not be greater than ' . $maxchar . ' characters.';
    }
    
    
}
