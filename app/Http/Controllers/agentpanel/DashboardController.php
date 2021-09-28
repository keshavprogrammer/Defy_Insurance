<?php

namespace App\Http\Controllers\agentpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Agency;
use App\Models\Agent;
use App\Models\Subagent;
use App\Models\Channel_partner;
use App\Models\Lead;
use App\Models\Client;

use Session;

class DashboardController extends Controller
{
	
    public function index() {
    	$user = Auth::user();
    	$agenc_id = $user->agenc_id;
    	
    	$agency_date = Agency::where("id", "=", $agenc_id)->get();
    	
    	Session::put('agenc_theme_id', $agency_date[0]->theme_id);
    	Session::put('agenc_logo', $agency_date[0]->logo);
    	Session::put('agenc_name', $agency_date[0]->name);
    	
    	
    	
    	
    	$data = array(
    		'Agent' => Agent::where("agenc_id", "=", Auth::id())->count(),
    		'Subagent' => Subagent::where("agenc_id", "=", Auth::id())->count(),
    		'Leads' => Lead::where("agenc_id", "=", Auth::id())->where("mark_opportunity", "=", "0")->count(),
    		'Opportunity' => Lead::where("agenc_id", "=", Auth::id())->where("mark_opportunity", "=", "1")->where("mark_client", "=", "0")->count(),
    		'Client' => Client::where("agenc_id", "=", Auth::id())->count(),
    	);
    	return view('agentpanel.dashboard', compact('data'));
    }
}
