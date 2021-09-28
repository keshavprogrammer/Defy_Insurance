<?php

namespace App\Http\Controllers\adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lead;
use App\Models\Agent;
use App\Models\Channel_partner;
use App\Models\Client;
use App\Models\Policyplan;

use Validator;
use Illuminate\Pagination\Paginator;

class PartnerReportController extends Controller
{
    private $pagination = 20;

    public function manage() {
    	$channel_partner = Channel_partner::pluck('name', 'id');
    	$data = Lead::where("mark_opportunity", "=", "0")->paginate($this->pagination);
    	$input["report_type"] = 1;
    	$channel_partner_id = 0;
        return view('adminpanel.partnerreport', compact('data','channel_partner','input','channel_partner_id'));
    }
    
    public function search(Request $request) {
        $input = $request->all();
        
        $channel_partner = Channel_partner::pluck('name', 'id');
        
        
        if(trim($input["report_type"])!="" ) 
        {
        	
        	if(trim($input["report_type"])!="" && $input["report_type"] == 1 )
        	{
        		$qry = Lead::where([
	                ["mark_opportunity", "=", "0"],
	            ]);
	            if(trim($input["channel_partner_id"])!="" && $input["channel_partner_id"] != "" )
        		{
	            	$qry->where([
	                	["channel_partner_id", "=", $input["channel_partner_id"]],
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
	            if(trim($input["channel_partner_id"])!="" && $input["channel_partner_id"] != "" )
        		{
	            	$qry->where([
	                	["channel_partner_id", "=", $input["channel_partner_id"]],
	            	]);
	            }
			}
			if(trim($input["report_type"])!="" && $input["report_type"] == 3 )
        	{
        		$qry = Client::where("agenc_id", "!=", ""); 
				if(trim($input["channel_partner_id"])!="" && $input["channel_partner_id"] != "" )
        		{
	            	$qry->where([
	                	["channel_partner_id", "=", $input["channel_partner_id"]],
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
        $channel_partner_id = $input["channel_partner_id"];
        $data = $qry->paginate($this->pagination);
        $data->appends($input);
        return view('adminpanel.partnerreport', compact('data','channel_partner','input','channel_partner_id'));
    }
}
