<?php

namespace App\Http\Controllers\partneruserpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sms_historie;
use Twilio\Rest\Client;
use App\Models\Lead;
use Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class BulksmsController extends Controller
{
    private $pagination = 20;

    public function manage() {
        $lead = Lead::pluck('fname', 'id');

        $data = array('type'=>'add', 'lead'=>$lead);    
        return view('partneruserpanel.bulksms', compact('data'));
    }
    public function multiplesms(Request $request) 
    {
        $input = $request->all();

        //print_r($input);

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
            return redirect()->route('partneruserpanel.bulksms.manage')->with('success', 'SMS sent successfully.');
        }
        else{
            return redirect()->route('partneruserpanel.bulksms.manage')->withErrors(['SMS is not sent']);
        }
    }
}
