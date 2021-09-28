<?php

namespace App\Http\Controllers\agencypanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Agency;
use App\Models\Subagent;
use App\Models\Channel_partner;
use App\Models\Channel_partner_user;
use App\Models\Sms_historie;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Pagination\Paginator;

class BulksmsController extends Controller
{
    private $pagination = 20;

    public function manage() {
        $agency = Agency::where("status", "=", "1")->pluck('name', 'id');
        $agent = Agent::where("status", "=", "1")->pluck('name', 'id');
        $subagent = Subagent::where("status", "=", "1")->pluck('name', 'id');
        $chanel_partner = Channel_partner::where("status", "=", "1")->pluck('name', 'id');
        $chanel_partner_user = Channel_partner_user::where("status", "=", "1")->pluck('name', 'id');

        $data = array('type'=>'add', 'agency'=>$agency, 'agent'=>$agent, 'subagent'=>$subagent, 'chanel_partner'=>$chanel_partner, 'chanel_partner_user'=>$chanel_partner_user);    
        return view('agencypanel.bulksms', compact('data'));
    }
    public function multiplesms(Request $request) 
    {
        $input = $request->all();

        //print_r($input);

        $all_agency = "";//$input['agency_select'][0];
        $all_agent = "";//$input['agent_select'][0];
        $all_subagent = "";//$input['subagent_select'][0];
        $all_chanel = "";//$input['chanel_partner_select'][0];
        $all_chaneluser = "";//$input['chanel_partner_user_select'][0];
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


        /*if($all_agency == "")
        {
            $agencyData = Agency::where("status", "=", "1")->get();
        }

        for ($ag=0; $ag < count($agencyData); $ag++) 
        { 
            $agntId = $agencyData[$ag]->id;
            $phone_number = $agencyData[$ag]->phone;

            $sentResponse = $client->messages->create($phone_number, 
                ['from' => $twilio_number, 'body' => $message] );
            
            if($sentResponse->sid != '')
            {
                $sms['sender_id'] = Auth::id();
                $sms['receiver_id'] = $agntId;
                $sms['sender_type'] = 'Admin';
                $sms['receiver_type'] = 'Agency';
                $sms['sms_type'] = 'Bluk';
                $sms['sms_content'] = $message;

                $sms_data = Sms_historie::create($sms);
            }
        }*/
        if($all_agent == "")
        {
            $agentData = Agent::where("status", "=", "1")->get();
        }

        for ($ag=0; $ag < count($agentData); $ag++) 
        { 
            $agntId = $agentData[$ag]->id;
            $phone_number = $agentData[$ag]->phone;

            $sentResponse = $client->messages->create($phone_number, 
                ['from' => $twilio_number, 'body' => $message] );
            
            if($sentResponse->sid != '')
            {
                $sms['sender_id'] = Auth::id();
                $sms['receiver_id'] = $agntId;
                $sms['sender_type'] = 'Agency';
                $sms['receiver_type'] = 'Agent';
                $sms['sms_type'] = 'Bluk';
                $sms['sms_content'] = $message;

                $sms_data = Sms_historie::create($sms);
            }
        }
        if($all_subagent == "")
        {
            $subagentData = Subagent::where("status", "=", "1")->get();
        }

        for ($ag=0; $ag < count($subagentData); $ag++) 
        { 
            $agntId = $subagentData[$ag]->id;
            $phone_number = $subagentData[$ag]->phone;

            $sentResponse = $client->messages->create($phone_number, 
                ['from' => $twilio_number, 'body' => $message] );
            
            if($sentResponse->sid != '')
            {
                $sms['sender_id'] = Auth::id();
                $sms['receiver_id'] = $agntId;
                $sms['sender_type'] = 'Agency';
                $sms['receiver_type'] = 'SubAgent';
                $sms['sms_type'] = 'Bluk';
                $sms['sms_content'] = $message;

                $sms_data = Sms_historie::create($sms);
            }
        }
        if($all_chanel == "")
        {
            $chanelData = Channel_partner::where("status", "=", "1")->get();
        }

        for ($ag=0; $ag < count($chanelData); $ag++) 
        { 
            $agntId = $chanelData[$ag]->id;
            $phone_number = $chanelData[$ag]->phone;

            $sentResponse = $client->messages->create($phone_number, 
                ['from' => $twilio_number, 'body' => $message] );
            
            if($sentResponse->sid != '')
            {
                $sms['sender_id'] = Auth::id();
                $sms['receiver_id'] = $agntId;
                $sms['sender_type'] = 'Agency';
                $sms['receiver_type'] = 'Channel_partner';
                $sms['sms_type'] = 'Bluk';
                $sms['sms_content'] = $message;

                $sms_data = Sms_historie::create($sms);
            }
        }
        if($all_chaneluser == "")
        {
            $chaneluserData = Channel_partner_user::where("status", "=", "1")->get();
        }

        for ($ag=0; $ag < count($chaneluserData); $ag++) 
        { 
            $agntId = $chaneluserData[$ag]->id;
            $phone_number = $chaneluserData[$ag]->phone;

            $sentResponse = $client->messages->create($phone_number, 
                ['from' => $twilio_number, 'body' => $message] );
            
            if($sentResponse->sid != '')
            {
                $sms['sender_id'] = Auth::id();
                $sms['receiver_id'] = $agntId;
                $sms['sender_type'] = 'Agency';
                $sms['receiver_type'] = 'Channel_partner_user';
                $sms['sms_type'] = 'Bluk';
                $sms['sms_content'] = $message;

                $sms_data = Sms_historie::create($sms);
            }
        }
        if($sentResponse->sid != '')
        {
            return redirect()->route('agencypanel.bulksms.manage')->with('success', 'SMS sent successfully.');
        }
        else{
            return redirect()->route('agencypanel.bulksms.manage')->withErrors(['SMS is not sent']);
        }
    }
}
