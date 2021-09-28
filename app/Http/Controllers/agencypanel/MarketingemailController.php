<?php

namespace App\Http\Controllers\agencypanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Pagination\Paginator;
use App\Models\Email_template;
use App\Models\Lead;
use App\Models\Marketing_email;

class MarketingemailController extends Controller
{
    private $pagination = 100;

    public function manage() {
    	$data = Marketing_email::where([["agency_id", "=", Auth::id()], ["is_active", "=", "1"]])->with("template_nm")->with("lead_nm")->paginate($this->pagination);
        return view('agencypanel.managemarketingemails', compact('data'));
    }

    public function add() {
    	$templates = Email_template::where("is_active", "=", "1")->pluck('name', 'id');
        $leads = Lead::select('id', 'fname', 'lname')->where([["agenc_id", "=", Auth::id()], ["mark_opportunity", "=", "0"]])->get();
        $data = array('type'=>'add', 'agency_id'=>Auth::id(), 'templates'=>$templates, 'leads'=>$leads);        
        return view('agencypanel.addmarketingemail', compact('data'));
    }

    public function save(Request $request) {
        $input = $request->all();
        $validator = Validator::make( $input, $this->getRules('Add', $input), $this->messages());
        if ($validator->fails()) {
        	$templates = Email_template::where("is_active", "=", "1")->pluck('name', 'id');
            $data = array('type'=>'add', 'input'=>$input, 'agency_id'=>Auth::id(), 'templates'=>$templates, 'error'=>$validator->messages());
            return view('agencypanel.addmarketingemail', compact('data'));
            exit();            
        }
        $update = array();
        $update['template_id'] = $input["template_id"];
        $update['subject'] = $input["subject"];
        $update['description'] = $input["description"];
        $update['agency_id'] = Auth::id();
        for($i=0; $i<$input["lcounter"]; $i++) {
            if(isset($input["leads"][$i])) {
                $update["user_id"] = $input["leads"][$i];
                $update["usertype"] = 'l';
                $email = Marketing_email::create($update);
            }
        }
        // $email = Marketing_email::create($input);
        // if($email->id>0) {
            return redirect()->route('agencypanel.marketingemail.manage')->with('success', 'Created successfully.');
        // } else {
        //     return redirect()->route('agencypanel.marketingemail.add')->withErrors(['Error creating record. Please try again.']);
        // }
    }

    public function delete($id) {
    	Marketing_email::where('id','=',$id)->delete();
    	return redirect()->route('agencypanel.marketingemail.manage')->with('success', 'Deleted successfully.');
    }


    private function getRules($type, $input) {
        $return = array();
        $return['template_id'] = 'required';
        $return['subject'] = 'required|max:50';
        $return['description'] = 'required';
        return $return;
    }

    private function messages() {
        return [
            'template.required'  => $this->getRequiredMessage('select template'),
            'subject.required'  => $this->getRequiredMessage('subject'),
            'subject.max'  => $this->getGreaterMessage('subject', 50),
        ];
    }

    private function getRequiredMessage($string) {
        return 'The ' . $string . ' field is required.';
    }

    private function getGreaterMessage($string, $maxchar) {
        return 'The ' . $string . ' may not be greater than ' . $maxchar . ' characters.';
    }

}
