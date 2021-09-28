<?php

namespace App\Http\Controllers\subagentpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sms_historie;
use App\Models\Client;
use App\Models\Lead;
use App\Models\Policyplan;
use Validator;
use Illuminate\Pagination\Paginator;

class BulksmsController extends Controller
{
    private $pagination = 20;

    public function manage() {
        $client = Client::pluck('fname', 'id');
        $lead = Lead::pluck('fname', 'id');

        $data = array('type'=>'add', 'client'=>$client, 'lead'=>$lead);    
        return view('subagentpanel.bulksms', compact('data'));
    }
    public function multiplesms(Request $request) 
    {
        $input = $request->all();

        //print_r($input);

        $all_client = "";//$input['agency_select'][0];
        $all_lead = "";//$input['agent_select'][0];
        
        $message = $input['msg'];
        
        /*$get_agency = $input['agency_select'];
        $get_agent = $input['agent_select'];
        $get_subagent = $input['subagent_select'];
        $get_chanel = $input['chanel_partner_select'];
        $get_chaneluser = $input['chanel_partner_user_select'];
        */

        $account_sid = env("TWILIO_SID");
        $auth_token = env("TWILIO_AUTH_TOKEN");
        $twilio_number = env("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);


        if($all_client == "")
        {
            $clientData = Client::get();
        }

        for ($ag=0; $ag < count($clientData); $ag++) 
        { 
            $agntId = $clientData[$ag]->id;
            $phone_number = $clientData[$ag]->phone;

            $sentResponse = $client->messages->create($phone_number, 
                ['from' => $twilio_number, 'body' => $message] );
            
            if($sentResponse->sid != '')
            {
                $sms['sender_id'] = Auth::id();
                $sms['receiver_id'] = $agntId;
                $sms['sender_type'] = 'Admin';
                $sms['receiver_type'] = 'Client';
                $sms['sms_type'] = 'Bluk';
                $sms['sms_content'] = $message;

                $sms_data = Sms_historie::create($sms);
            }
        }
        if($all_lead == "")
        {
            $leadData = Lead::get();
        }

        for ($ag=0; $ag < count($leadData); $ag++) 
        { 
            $agntId = $leadData[$ag]->id;
            $phone_number = $leadData[$ag]->phone;

            $sentResponse = $client->messages->create($phone_number, 
                ['from' => $twilio_number, 'body' => $message] );
            
            if($sentResponse->sid != '')
            {
                $sms['sender_id'] = Auth::id();
                $sms['receiver_id'] = $agntId;
                $sms['sender_type'] = 'Admin';
                $sms['receiver_type'] = 'Lead';
                $sms['sms_type'] = 'Bluk';
                $sms['sms_content'] = $message;

                $sms_data = Sms_historie::create($sms);
            }
        }
       
        if ($sms_data->id > 0) 
        {
            return redirect()->route('subagentpanel.bulksms.manage')->with('success', 'SMS sent successfully.');
        }
        else{
            return redirect()->route('subagentpanel.bulksms.manage')->withErrors(['SMS is not sent']);
        }
    }
}
