<?php
namespace App\Http\Controllers\partneruserpanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Agency;
use App\Models\Agent;
use App\Models\Subagent;
use App\Models\Channel_partner_user;
use App\Models\Lead;
use App\Models\Client;
use Session;

class DashboardController extends Controller{	
    public function index() {
    	$user = Auth::user();
    	$agenc_id = $user->agenc_id;
    	
    	$agency_date = Agency::where("id", "=", $agenc_id)->get();
    	
    	Session::put('agenc_theme_id', $agency_date[0]->theme_id);
    	Session::put('agenc_logo', $agency_date[0]->logo);
		Session::put('agenc_name', $agency_date[0]->name);
		
		$toalLeads = Lead::where("channel_partner_user_id", "=", $user->id)->count();

    	$data = array('Leads' => $toalLeads);
    	return view('partneruserpanel.dashboard', compact('data'));
    }
}
