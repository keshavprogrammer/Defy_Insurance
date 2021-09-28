@extends('agentpanel.default.master')
 
@section('title', 'Add/Edit Client Policy')

@section('content')

                <?php
                
                
                
                $label = "Create";
                
                $client_id = "";
                $policy_type_id = "";
                $policy_id = "";
                
                $line_of_business_id = "";
                $policy_status = "";
                $policy = "";
                $effective_date = "";
                $expiration_date = "";
                $master_company = "";
                $writing_company = "";
                $billing_type = "";
                $rating_state_id = "";
                $original_agent_code = "";
                $override_agent_code = "";
                $agency_code = "";
                $referral_partner_code = "";
                $lead_source = "";
                $written_premium = "";
                $estimated_fees = "";
                $estimated_taxes = "";
                $full_term_premium = "";
                $annual_premium = "";
                $total_commission = "";
                $department_id = "";
                $service_team = "";
                $insured_information_pl_id = "";
                $insured_information_cl_id = "";
                $additional_interests_id = "";
                $description = "";
                $lead_source_id = "";

                $agent_id  = "";
                
                $id = "";
                $isError = false;
                $formRoute = 'agentpanel.clientpolicy.save';
                
                if(isset($data['error'])) {
                    $isError = true;
                    if($data['type']=="Edit") {
                        $label = "Edit";
                        $formRoute = 'agentpanel.clientpolicy.update';
                    }
                    $client_id = $data['input']['client_id'];                    
                    $agent_id = $data['input']['agent_id'];
                    
                    $line_of_business_id = $data['input']['line_of_business_id'];
                    $policy_status = $data['input']['policy_status'];
                    $policy = $data['input']['policy'];
                    $effective_date = $data['input']['effective_date'];
                    $expiration_date = $data['input']['expiration_date'];
                    $master_company = $data['input']['master_company'];
                    $writing_company = $data['input']['writing_company'];
                    $billing_type = $data['input']['billing_type'];
                    $rating_state_id = $data['input']['rating_state_id'];
                    $original_agent_code = $data['input']['original_agent_code'];
                    $override_agent_code = $data['input']['override_agent_code'];
                    $agency_code = $data['input']['agency_code'];
                    $referral_partner_code = $data['input']['referral_partner_code'];
                    $lead_source_id = $data['input']['lead_source_id'];
                    $written_premium = $data['input']['written_premium'];
                    $estimated_fees = $data['input']['estimated_fees'];
                    $estimated_taxes = $data['input']['estimated_taxes'];
                    $full_term_premium = $data['input']['full_term_premium'];
                    $annual_premium = $data['input']['annual_premium'];
                    $total_commission = $data['input']['total_commission'];
                    $department_id = $data['input']['department_id'];
                    $service_team = $data['input']['service_team'];
                    $insured_information_pl_id = $data['input']['insured_information_pl_id'];
                    $insured_information_cl_id = $data['input']['insured_information_cl_id'];
                    $additional_interests_id = $data['input']['additional_interests_id'];
                    $description = $data['input']['description'];
                    
                } else { 
                    if($data['type'] == "edit") {
                        $label = "Edit";
                        $client_id = $data['input'][0]->client_id;
                        
                        $agent_id = $data['input'][0]->agent_id;
                        
                        $id = $data['input'][0]->id;
                        
                        
                        $line_of_business_id = $data['input'][0]->line_of_business_id;
                        $policy_status = $data['input'][0]->policy_status;
                        $policy = $data['input'][0]->policy;
                        $effective_date = $data['input'][0]->effective_date;
                        $expiration_date = $data['input'][0]->expiration_date;
                        $master_company = $data['input'][0]->master_company;
                        $writing_company = $data['input'][0]->writing_company;
                        $billing_type = $data['input'][0]->billing_type;
                        $rating_state_id = $data['input'][0]->rating_state_id;
                        $original_agent_code = $data['input'][0]->original_agent_code;
                        $override_agent_code = $data['input'][0]->override_agent_code;
                        $agency_code = $data['input'][0]->agency_code;
                        $referral_partner_code = $data['input'][0]->referral_partner_code;
                        $lead_source_id = $data['input'][0]->lead_source_id;
                        $written_premium = $data['input'][0]->written_premium;
                        $estimated_fees = $data['input'][0]->estimated_fees;
                        $estimated_taxes = $data['input'][0]->estimated_taxes;
                        $full_term_premium = $data['input'][0]->full_term_premium;
                        $annual_premium = $data['input'][0]->annual_premium;
                        $total_commission = $data['input'][0]->total_commission;
                        $department_id = $data['input'][0]->department_id;
                        $service_team = $data['input'][0]->service_team;
                        $insured_information_pl_id = $data['input'][0]->insured_information_pl_id;
                        $insured_information_cl_id = $data['input'][0]->insured_information_cl_id;
                        $additional_interests_id = $data['input'][0]->additional_interests_id;
                        $description = $data['input'][0]->description;
                        
                        
                       
                        $formRoute = 'agentpanel.clientpolicy.update';
                    }                    
                } 
                ?>
                <div class="top-dashboard-title">
                    <div class="d-code-main">
                        <div class="d-title">
                            <h4><strong>{{ $label }} Client Policy</strong><span>|</span>Enter Client Policy details and submit </h4>
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
                                'agency_id', $data['agency_id']
                                ) 
                            }}
                            {{ Form::hidden(
                                'agent_id', $data['agent_id']
                                ) 
                            }}
                            {{ Form::hidden(
                                'client_id', $data['cid']
                                ) 
                            }}
                              <div class="user-pro-detail-main-content">
                                <div class="user-pro-detail-sub-content">
                                    <div class="user-pro-detail-main-content-title">
                                        <h1>Client Policy management:</h1>
                                    </div>
                                    <div class="user-pro-detail-content">
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Select Line of Business (LOB)</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'line_of_business_id', 
                                                    $lineOfBusiness,
                                                    $line_of_business_id, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Line of Business (LOB)',
                                                        'required' => false,
                                                        // 'onchange' => 'ajaxSelectPolicyplan(this.value)',
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-pro-detail-main-content-title">
                                        <h1>POLICY INFO</h1>
                                    </div>
                                    <div class="user-pro-detail-content">
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Policy Status <span class="text-danger h5">*</span> </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'policy_status', 
                                                    $policyStatus,
                                                    $policy_status, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Policy Status',
                                                        'id' => 'policy_status',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Policy # <span class="text-danger h5"> *</span></label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'policy', $policy, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Policy #',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Effective Date <span class="text-danger h5"> *</span></label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'effective_date', $effective_date, 
                                                    [
                                                        'id' => 'start_date',
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Effective Date',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Expiration Date <span class="text-danger h5"> *</span></label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'expiration_date', $expiration_date, 
                                                    [
                                                        'id' => 'next_premium_date',
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Expiration Date',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Master Company <span class="text-danger h5">*</span> </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'master_company', 
                                                    $company,
                                                    $master_company, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Master Company',
                                                        'id' => 'master_company',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Writing Company <span class="text-danger h5">*</span> </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'writing_company', 
                                                    $company,
                                                    $writing_company, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Writing Company',
                                                        'id' => 'writing_company',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Billing Type <span class="text-danger h5">*</span> </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'billing_type', 
                                                    $billingType,
                                                    $billing_type, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Billing Type ',
                                                        'id' => 'billing_type',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Rating State <span class="text-danger h5">*</span> </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'rating_state_id', 
                                                    $ratingState,
                                                    $rating_state_id, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Rating State',
                                                        'id' => 'rating_state_id',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Original agent Code </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'original_agent_code', 
                                                    $originalAgentCode,
                                                    $original_agent_code, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Original agent Code',
                                                        'id' => 'original_agent_code',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Override Agent code </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'override_agent_code', 
                                                    $overrideProducerCode,
                                                    $override_agent_code, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Override Agent code',
                                                        'id' => 'override_agent_code',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>

                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Agency Code</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'agency_code', $agency_code, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Agency Code',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Referral partner code  </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'referral_partner_code', 
                                                    $referalPartnerCode,
                                                    $referral_partner_code, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Referral partner code',
                                                        'id' => 'referral_partner_code',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Lead Source  </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'lead_source_id', 
                                                    $leadSource,
                                                    $lead_source_id, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Lead Source',
                                                        'id' => 'lead_source_id',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-pro-detail-main-content-title">
                                        <h1>PREMIUM & ADDITIONAL CHARGES</h1>
                                    </div>
                                    <div class="user-pro-detail-content">



                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Written Premium <span class="text-danger h5"> *</span></label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'written_premium', $written_premium, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Written Premium ',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Estimated Fees</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'estimated_fees', $estimated_fees, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Estimated Fees',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Estimated Taxes</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'estimated_taxes', $estimated_taxes, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Estimated Taxes',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Full-Term Premium <span class="text-danger h5"> *</span> </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'full_term_premium', $full_term_premium, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Full-Term Premium',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Annual Premium <span class="text-danger h5"> *</span></label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'annual_premium', $annual_premium, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Annual Premium',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>

                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Total Commission</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'total_commission', $total_commission, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Total Commission',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>


                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>DEPARTMENT</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'department_id', 
                                                    $department,
                                                    $department_id, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Department',
                                                        'id' => 'department_id',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>SERVICE TEAM   </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'service_team', 
                                                    $serviceTeam,
                                                    $service_team, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Service Team',
                                                        'id' => 'service_team',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>

                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Insured Information (PL)</label>
                                            </div>
                                            
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'insured_information_pl_id', 
                                                    $insuredInformationPl,
                                                    $insured_information_pl_id, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Insured Information (PL)',
                                                        'id' => 'insured_information_pl_id',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>

                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Insured Information (CL)</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'insured_information_cl_id', 
                                                    $insuredInformationCl,
                                                    $insured_information_cl_id, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Insured Information (CL)',
                                                        'id' => 'insured_information_cl_id',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>

                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Additional Interests</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'additional_interests_id', 
                                                    $additionalInterests,
                                                    $additional_interests_id, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Additional Interests',
                                                        'id' => 'additional_interests_id',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        {{-- <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Producer  </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'policy_id', 
                                                    $data['policyplan'],
                                                    $policy_id, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Policy Plan',
                                                        'id' => 'policy_id',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div> --}}

                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Description</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'description', $description, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Description',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>

                                        {{--                                         
                                        <div class="user-pro-detail-content-dt-one" id="property_document_photo_div" <?php if($policy_type_id == 3){ echo 'style="display: block;"'; }else{ echo 'style="display: none;"'; } ?>>
                                            <div class="user-pro-detail-content-left">
                                                <label>Property Document Photo</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <div class="user-img-main" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <img src="{{ $property_document_photo }}" id="logoimg4" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                                                    <div class="button-wrapper">
                                                        <span class="label"><img src="{{ asset('adminpanel/images/pencil-edit-button.svg') }}"></span>
                                                        {{ Form::file(
                                                            'property_document_photo', 
                                                            [
                                                                'class' => 'upload-box',
                                                                'id' => 'property_document_photo',
                                                                'placeholder' => 'Select Property Document Photo',
                                                                'onchange' => 'displaySingleImagePreview(this, "logoimg4")'
                                                            ]
                                                            ) 
                                                        }}
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                       
                                        
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
               