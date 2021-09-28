@extends('agencypanel.default.master')
 
@section('title', 'Add/Edit Lead')

@section('content')

    <?php
    
    $label = "Create";
    
    $insured_name = "";
    $lead_status = "";
    $policy_type = "";
    $xdate = "";
    $referal_partner = "";
    $lead_owner = "";
    $fname = "";
    $lname = "";
    $email = "";
    $phone = "";                
    $agenc_id  = "";
    $mark_opportunity = false;
    $policyplan_id  = "";
    $notes  = "";
    $agent_id = "";
    $subagent_id = "";
    $id = "";
    $isError = false;
    $formRoute = 'agencypanel.lead.save';
    
    if(isset($data['error'])) {
        $isError = true;
        if($data['type']=="Edit") {
            $label = "Edit";
            $formRoute = 'agencypanel.lead.update';
        }
        $insured_name = $data['input']['insured_name'];
        $lead_status = $data['input']['lead_status'];
        $policy_type = $data['input']['policy_type'];
        $xdate = $data['input']['xdate'];
        $referal_partner = $data['input']['referal_partner'];
        $lead_owner = $data['input']['lead_owner'];
        $fname = $data['input']['fname'];
        $lname = $data['input']['lname'];                    
        $email = $data['input']['email'];
        $phone = $data['input']['phone'];
        $policyplan_id = $data['input']['policyplan_id'];
        $notes = $data['input']['notes'];                    
        $agenc_id = $data['input']['agenc_id'];
        $mark_opportunity = $data['input']['mark_opportunity'];
        $agent_id =$data['input']['agent_id'];
        $subagent_id = $data['input']['subagent_id'];

    } else { 
        if($data['type'] == "edit") {
            $label = "Edit";
            $insured_name = $data['input'][0]->insured_name;
            $lead_status = $data['input'][0]->lead_status;
            $policy_type = $data['input'][0]->policy_type;
            $xdate = $data['input'][0]->xdate;
            $referal_partner = $data['input'][0]->referal_partner;
            $lead_owner = $data['input'][0]->lead_owner;
            $fname = $data['input'][0]->fname;
            $lname = $data['input'][0]->lname;
            $email = $data['input'][0]->email;
            $phone = $data['input'][0]->phone;
            $policyplan_id = $data['input'][0]->policyplan_id;
            $agenc_id = $data['input'][0]->agenc_id;
            $mark_opportunity = $data['input'][0]->mark_opportunity;
            $notes = $data['input'][0]->notes;
            $agent_id = $data['input'][0]->agent_id;
            $subagent_id = $data['input'][0]->subagent_id;
            $id = $data['input'][0]->id;                        
            $formRoute = 'agencypanel.lead.update';
        }
        // if($mark_opportunity==1) {
        //     $mark_opportunity = true;
        // }
        
        
    } 
    
    ?>
    <div class="top-dashboard-title">
        <div class="d-code-main">
            <div class="d-title">
                <h4><strong>{{ $label }} Lead</strong><span>|</span>Enter Lead details and submit </h4>
            </div>
        </div>
        
    </div>

    <div class="dashboard-content-main add-user-main">
        <div class="add-user-one-main-content">                        
            @if($errors->any())
                <div class="error-message-box">                    
                    <p>{{$errors->first()}}</p>
                </div>
            @endif
            @if($isError)
                <div class="error-message-box">
                    <?php foreach($data['error']->all() as $error) {
                        echo "<p>". $error . "</p>";
                    } ?>
                </div>
            @endif
            {{ Form::open(array('route' => $formRoute, 'method' => 'post', 'enctype' => 'multipart/form-data')) }}
                {{ Form::hidden(
                    'id', $id
                    ) 
                }}
                {{ Form::hidden(
                    'agenc_id', $data['agenc_id']
                    ) 
                }}
                <div class="user-pro-detail-main-content">
                    <div class="user-pro-detail-sub-content">
                        <div class="user-pro-detail-main-content-title">
                            <h1>Lead management:</h1>
                        </div>
                        <div class="user-pro-detail-content">
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Enter Insured Name </label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    {{ Form::text(
                                        'insured_name', $insured_name, 
                                        [
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Insured Name',
                                            'required' => false
                                        ]
                                        ) 
                                    }}
                                </div>
                            </div>
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Enter First Name</label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    {{ Form::text(
                                        'fname', $fname, 
                                        [
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter First Name',
                                            'required' => false
                                        ]
                                        ) 
                                    }}
                                </div>
                            </div>
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Enter Last Name</label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    {{ Form::text(
                                        'lname', $lname, 
                                        [
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Last Name',
                                            'required' => false
                                        ]
                                        ) 
                                    }}
                                </div>
                            </div>
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Select Lead Status</label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    {{ Form::select(
                                        'lead_status',$data['leadStatus'], $lead_status, 
                                        [
                                            'class' => 'form-control', 
                                            'placeholder' => 'Select Lead Status',
                                            'required' => false
                                        ]
                                        ) 
                                    }}
                                </div>
                            </div>
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Select Policy Type</label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    {{ Form::select(
                                        'policy_type',$data['policyType'], $policy_type, 
                                        [
                                            'class' => 'form-control', 
                                            'placeholder' => 'Select Policy Type',
                                            'required' => false
                                        ]
                                        ) 
                                    }}
                                </div>
                            </div>
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Select Xdate </label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    {{ Form::date(
                                        'xdate', $xdate, 
                                        [
                                            'class' => 'form-control', 
                                            'placeholder' => 'Select Xdate',
                                            'required' => false
                                        ]
                                        ) 
                                    }}
                                </div>
                            </div>
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Enter Email</label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    {{ Form::email(
                                        'email', $email, 
                                        [
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Email',
                                            'required' => false
                                        ]
                                        ) 
                                    }}
                                </div>
                            </div>
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Enter Contact no.</label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    {{ Form::text(
                                        'phone', $phone, 
                                        [
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Contact No.',
                                            'required' => false
                                        ]
                                        ) 
                                    }}
                                </div>
                            </div>
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Enter Referal Partner</label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    {{ Form::text(
                                        'referal_partner', $referal_partner, 
                                        [
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Referal Partner',
                                            'required' => false
                                        ]
                                        ) 
                                    }}
                                </div>
                            </div>
                        </div>
                        <div class="user-pro-detail-main-content-title">
                            <h1>Lead Owner</h1>
                        </div>
                        <div class="user-pro-detail-content">
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Select Agent </label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    {{ Form::select(
                                        'agent_id', $data['agents'],$agent_id, 
                                        [
                                            'class' => 'form-control', 
                                            'placeholder' => 'Select Agent ',
                                            'id' => 'agent_id',
                                            'required' => false
                                        ]
                                        ) 
                                    }}
                                </div>
                            </div>
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Select Sub Agent</label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    {{ Form::select(
                                        'subagent_id', $data['subAgents'],$subagent_id, 
                                        [
                                            'class' => 'form-control', 
                                            'placeholder' => 'Select Sub Agent ',
                                            'id' => 'subagent_id',
                                            'required' => false
                                        ]
                                        ) 
                                    }}
                                </div>
                            </div>
                     
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Mark as Opportunity</label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    <label class="ki-checkbox">
                                        {{ Form::checkbox('mark_opportunity', 1, $mark_opportunity) }}
                                        <span style="top:-5px;"></span>
                                    </label>
                                    
                                </div>
                            </div>
                            <div class="user-pro-detail-content-dt-one">
                                <div class="user-pro-detail-content-left">
                                    <label>Enter Note</label>
                                </div>
                                <div class="user-pro-detail-content-right">
                                    {{ Form::textarea(
                                        'notes', $notes, 
                                        [
                                            'class' => 'form-control', 
                                            'placeholder' => 'Enter Note',
                                            'required' => false
                                        ]
                                        ) 
                                    }}
                                </div>
                            </div>
                        </div>

                        <div class="next-step-btn-main">
                            {{ Form::button(
                                'Save',
                                [
                                    'class' => 'next-step',
                                    'type' => 'submit'
                                ]
                                )
                            }}
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
                
 
@endsection
               