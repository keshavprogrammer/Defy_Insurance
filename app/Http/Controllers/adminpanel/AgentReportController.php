<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;
use App\Models\Agent;
use App\Models\Client;
use App\Models\Policyplan;

use Validator;
use Illuminate\Pagination\Paginator;

class AgentReportController extends Controller
{
    private $pagination = 20;

    public function manage() {
    	$agent = Agent::pluck('name', 'id');
    	$data = Lead::where("mark_opportunity", "=", "0")->paginate($this->pagination);
    	$input["report_type"] = 1;
    	$agent_id = 0;
        return view('adminpanel.agentreport', compact('data','agent','input','agent_id'));
    }
    
    public function search(Request $request) {
        $input = $request->all();
        
        $agent = Agent::pluck('name', 'id');
        
        
        if(trim($input["report_type"])!="" ) 
        {
        	
        	if(trim($input["report_type"])!="" && $input["report_type"] == 1 )
        	{
        		$qry = Lead::where([
	                ["mark_opportunity", "=", "0"],
	            ]);
				
	            if(trim($input["agent_id"])!="" && $input["agent_id"] != "" )
        		{
	            	$qry->where([
	                	["agent_id", "=", $input["agent_id"]],
	            	]);
	            }
			}
			if(trim($input["report_type"])!="" && $input["report_type"] == 2 )
        	{
        		$qry = Lead::where([
	                ["mark_opportunity", "=", "1"],
	            ]);
	            $qry->where([
	                ["mark_client", "=", "0"],
	            ]);
	            if(trim($input["agent_id"])!="" && $input["agent_id"] != "" )
        		{
	            	$qry->where([
	                	["agent_id", "=", $input["agent_id"]],
	            	]);
	            }
			}
			if(trim($input["report_type"])!="" && $input["report_type"] == 3 )
        	{
        		$qry = Client::where("agenc_id", "!=", ""); 
				if(trim($input["agent_id"])!="" && $input["agent_id"] != "" )
        		{
	            	$qry->where([
	                	["agent_id", "=", $input["agent_id"]],
	            	]);
	            }
			}
			
			if(trim($input["startDate"])!="" && trim($input["endDate"])!="") 
            {
            	$sdate = explode("/",$input["startDate"]);
            	$startDate = $sdate[2]."-".$sdate[0]."-".$sdate[1];
            	
            	$edate = explode("/",$input["endDate"]);
            	$endDate = $edate[2]."-".$edate[0]."-".$edate[1];
            	
            	$qry->whereBetween('created_at', [$startDate, $endDate]);
        	}
			
	                        
        }
        $agent_id = $input["agent_id"];
        $data = $qry->paginate($this->pagination);
        $data->appends($input);
        return view('adminpanel.agentreport', compact('data','agent','input','agent_id'));
    }
}
