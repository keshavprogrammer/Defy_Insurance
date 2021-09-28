<?php

namespace App\Http\Controllers\agentpanel;

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
    	$data = Lead::where("agent_id", "=", Auth::id())->where("mark_opportunity", "=", "0")->paginate($this->pagination);
    	$input["report_type"] = 1;
    	
        return view('agentpanel.agentreport', compact('data','input'));
    }
    
    public function search(Request $request) {
        $input = $request->all();
        
        
        
        
        if(trim($input["report_type"])!="" ) 
        {
        	
        	if(trim($input["report_type"])!="" && $input["report_type"] == 1 )
        	{
        		$qry = Lead::where("agent_id", "=", Auth::id()); 
				$qry->where([
	                ["mark_opportunity", "=", "0"],
	            ]);
	            
			}
			if(trim($input["report_type"])!="" && $input["report_type"] == 2 )
        	{
        		$qry = Lead::where("agent_id", "=", Auth::id()); 
				$qry->where([
	                ["mark_opportunity", "=", "1"],
	            ]);
	            $qry->where([
	                ["mark_client", "=", "0"],
	            ]);
	            
			}
			if(trim($input["report_type"])!="" && $input["report_type"] == 3 )
        	{
        		$qry = Client::where("agent_id", "=", Auth::id()); 
				
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
        
        $data = $qry->paginate($this->pagination);
        $data->appends($input);
        return view('agentpanel.agentreport', compact('data','input'));
    }
}
