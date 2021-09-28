<?php

namespace App\Http\Controllers\agencypanel;

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

class DashboardController extends Controller
{
	
    public function index() {
    	
    	$data = array(
    		'Agent' => Agent::where("agenc_id", "=", Auth::id())->count(),
    		'Subagent' => Subagent::where("agenc_id", "=", Auth::id())->count(),
    		'Leads' => Lead::where("agenc_id", "=", Auth::id())->where("mark_opportunity", "=", "0")->count(),
    		'Opportunity' => Lead::where("agenc_id", "=", Auth::id())->where("mark_opportunity", "=", "1")->where("mark_client", "=", "0")->count(),
    		'Client' => Client::where("agenc_id", "=", Auth::id())->count(),
    	);
    	return view('agencypanel.dashboard', compact('data'));
    }
}
