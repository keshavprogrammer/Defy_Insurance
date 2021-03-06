<?php

namespace App\Http\Controllers\agencypanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('agencypanel.login');
    }

    public function submitlogin(Request $request) 
    {
    	try {
	            $validator = Validator::make( $request->all(), $this->getRules('Add', $request->all()), $this->messages());
	            if ($validator->fails()) 
	            {
	                return redirect()->back()->withInput()->withErrors($validator->messages());
	            }
	            if (Auth::guard('agency')->attempt(['email' => $request->username, 'password' => $request->password], $request->get('remember'))) 
	            {
	                return redirect()->route('agencypanel.dashboard');
	            }

	            return redirect()->back()->withInput()->withErrors(['Invalid username or password.']);
        } catch (RuntimeException $ex) {
            return redirect()->back()->withInput()->withErrors([$ex->getMessage()]);
        }
    }

    public function logout() {
    	Auth::logout();
    	return redirect()->route('agencypanel.login');
    }

    private function getRules($type, $input) {
        $return = array();
        $return['username'] = 'required|max:50';
        $return['password'] = 'required|max:20';
        return $return;
    }

    private function messages() {
        return [
            // 'question.required'  => 'The question field is required.'
        ];
    }
}
