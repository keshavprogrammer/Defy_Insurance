@extends('subagentpanel.default.master')
 
@section('title', 'Add/Edit Lead')

@section('content')

                <?php
                
                $label = "Create";
                
                $fname = "";
                $lname = "";
                $email = "";
                $phone = "";                
                $agenc_id  = "";
                $agent_id  = "";
                $mark_opportunity = false;
                $policyplan_id  = "";
                $notes  = "";
                $id = "";
                $isError = false;
                $formRoute = 'subagentpanel.lead.save';
                
                if(isset($data['error'])) {
                    $isError = true;
                    if($data['type']=="Edit") {
                        $label = "Edit";
                        $formRoute = 'subagentpanel.lead.update';
                    }
                    $name = $data['input']['fname'];
                    $name = $data['input']['lname'];                    
                    $email = $data['input']['email'];
                    $phone = $data['input']['phone'];
                    $policyplan_id = $data['input']['policyplan_id'];
                    $notes = $data['input']['notes'];                    
                    $agenc_id = $data['input']['agenc_id'];
                    $agent_id = $data['input']['agent_id'];
                    $mark_opportunity = $data['input']['mark_opportunity'];
                    
                } else { 
                    if($data['type'] == "edit") {
                        $label = "Edit";
                        $fname = $data['input'][0]->fname;
                        $lname = $data['input'][0]->lname;
                        $email = $data['input'][0]->email;
                        $phone = $data['input'][0]->phone;
                        $policyplan_id = $data['input'][0]->policyplan_id;
                        $agenc_id = $data['input'][0]->agenc_id;
                        $agent_id = $data['input'][0]->agent_id;
                        $mark_opportunity = $data['input'][0]->mark_opportunity;
                        $notes = $data['input'][0]->notes;
                        $id = $data['input'][0]->id;                        
                        $formRoute = 'subagentpanel.lead.update';
                    }
                    if($mark_opportunity==1) {
                    	$mark_opportunity = true;
                	}
                	
                	
                } 
                $policyplan_idVal = array();
                	foreach($data['policyplan'] as $id2 => $policyplans)
                	{
						$policyplan_idVal[$id2]=false;
					}
                	if($policyplan_id!="") 
                	{
                		$policyplan_id_array = explode(",", $policyplan_id);
                    	foreach ($policyplan_id_array as $key => $value) 
                    	{
                        	$policyplan_idVal[$value] = true;
                    	}
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
                            {{ Form::hidden(
                                'agent_id', $data['agent_id']
                                ) 
                            }}
                            {{ Form::hidden(
                                'subagent_id', $data['subagent_id']
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
                                        
                                       {{-- <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Select Policies</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                            
                                            	@foreach($data['policyplan'] as $id => $policyplans)
                                            	    <div style="width: 100%;">
                                                    <label class="ki-checkbox">
                                                        {{ Form::checkbox('policyplan_id[]', $id, $policyplan_idVal[$id]) }}
                                                        <span style="top:-5px;"></span>
                                                    </label>
                                                    {{ $policyplans }}
                                                    </div>
                                                @endforeach
                                            
                                                
                                            </div>
                                        </div>
                                        --}}
                                        
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
               