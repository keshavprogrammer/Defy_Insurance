<?php
namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\How_hear_about;
use Validator;
use Illuminate\Pagination\Paginator;

class UserController extends Controller 
{
    private $pagination = 20;

    public function manage() {
        $data = User::query()->paginate($this->pagination);
        return view('adminpanel.manageuser', compact('data'));
    }

    public function search(Request $request) {
        $input = $request->all();
        $qry = User::query(); 
        if(trim($input["search"])!="") {
            $search = $input["search"];
            $qry->where([
                ["fname", "like", "%{$search}%"],
            ]);
            $qry->orwhere([
                ["lname", "like", "%{$search}%"],
            ]);
            $qry->orwhere([
                ["email", "like", "%{$search}%"],
            ]);
        }
        $data = $qry->paginate($this->pagination);
        $data->appends($input);
        return view('adminpanel.manageuser', compact('data'));
    }

    public function add() {
        $how_hear_abouts = How_hear_about::where("is_active", "=", "1")->pluck('name', 'id');
        $data = array('type'=>'add', 'how_hear_abouts'=>$how_hear_abouts);
        return view('adminpanel.adduser', compact('data'));
    }

    public function save(Request $request) {
        $input = $request->all();
        $validator = Validator::make( $input, $this->getRules('Add', $input), $this->messages());
        if ($validator->fails()) { 
            $how_hear_abouts = How_hear_about::where("is_active", "=", "1")->pluck('name', 'id');
            $data = array('type'=>'add', 'input'=>$input, 'how_hear_abouts'=>$how_hear_abouts, 'error'=>$validator->messages());
            return view('adminpanel.adduser', compact('data'));
            exit();            
        }
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        if($user->id>0) {
            return redirect()->route('adminpanel.user.manage')->with('success', 'Created successfully.');
        } else {
            return redirect()->route('adminpanel.user.add')->withErrors(['Error creating record. Please try again.']);
        }
    }

	public function edit($id) {
        $how_hear_abouts = How_hear_about::where("is_active", "=", "1")->pluck('name', 'id');
        $input = User::where('id', '=', $id)->get();
        $data = array('type'=>'edit', 'input'=>$input, 'how_hear_abouts'=>$how_hear_abouts);
	    return view('adminpanel.adduser', compact('data'));
	}

	public function update(Request $request) {
		$input = $request->all();
        $id = $input['id'];
        $validator = Validator::make( $input, $this->getRules('Edit', $input), $this->messages()); 
        
        if ($validator->fails()) { 
            $how_hear_abouts = How_hear_about::where("is_active", "=", "1")->pluck('name', 'id');
            $data = array('type'=>'Edit', 'input'=>$input, 'how_hear_abouts'=>$how_hear_abouts, 'error'=>$validator->messages());
            return view('adminpanel.adduser', compact('data'));
            exit();            
        }
        $update = array();
        $update["fname"] = $input['fname'];
        $update["lname"] = $input['lname'];
        $update["phone"] = $input['phone'];
        $update["email"] = $input['email'];
        if($input['password']!="") {
            $update["password"] = bcrypt($input['password']);
        }
        $update["city"] = $input['city'];
        $update["state"] = $input['state'];
        $update["zip"] = $input['zip'];
        $update["address_street"] = $input['address_street'];
        $update["address_apt"] = $input['address_apt'];
        $update["hear_about"] = $input['hear_about'];
        $user = User::where('id', '=', $id)->update($update);
        return redirect()->route('adminpanel.user.manage')->with('success', 'Updated successfully.');

	}

    public function delete($id) {
        User::where('id','=',$id)->delete();
        return redirect()->route('adminpanel.user.manage')->with('success', 'Deleted successfully.');
    }

	private function getRules($type, $input) {
        $return = array();
        $return['fname'] = 'required|max:30';
        $return['lname'] = 'required|max:30';
        $return['phone'] = 'required|max:20';
        $return['address_street'] = 'required|max:200';
        $return['city'] = 'required|max:50';
        $return['state'] = 'required|max:50';
        $return['zip'] = 'required|max:10';
        $return['hear_about'] = 'required';
        if($type=="Edit") {
            $return['email'] = 'required|email|max:100';
            if($input["password"]!="") {
                $return['password'] = 'min:6|max:20';
            }
        } else {
            $return['email'] = 'required|email|unique:users,email|max:100';
            $return['password'] = 'required|min:6|max:20';
        }
        return $return;
    }

    private function messages() {
        return [
            'fname.required'  => $this->getRequiredMessage('first name'),
            'fname.max'  => $this->getGreaterMessage('first name', 30),
            'lname.required'  => $this->getRequiredMessage('last name'),
            'lname.max'  => $this->getGreaterMessage('last name', 30),
            'phone.required'  => $this->getRequiredMessage('phone no.'),
            'phone.max'  => $this->getGreaterMessage('phone no.', 20),
            'address_street.required'  => $this->getRequiredMessage('address (street)'),
            'address_street.max'  => $this->getGreaterMessage('address (street)', 200),
            'hear_about.required'  => $this->getRequiredMessage('how did you hear about us'),
        ];
    }

    private function getRequiredMessage($string) {
        return 'The ' . $string . ' field is required.';
    }

    private function getGreaterMessage($string, $maxchar) {
        return 'The ' . $string . ' may not be greater than ' . $maxchar . ' characters.';
    }
}

?>