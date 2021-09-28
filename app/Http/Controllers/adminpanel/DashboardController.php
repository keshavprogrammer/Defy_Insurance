<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agency;
use App\Models\Agent;
use App\Models\Subagent;
use App\Models\Channel_partner;

class DashboardController extends Controller
{
    public function index() {
    	$data = array(
    		'Agency' => Agency::count(),
    		'Agent' => Agent::count(),
    		'Subagent' => Subagent::count(),
    		'Subagent' => Subagent::count(),
    		'Channel_partner' => Channel_partner::count(),
    	);
    	return view('adminpanel.dashboard', compact('data'));
    }
}
