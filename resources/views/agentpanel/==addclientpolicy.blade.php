@extends('agentpanel.default.master')
 
@section('title', 'Add/Edit Client Policy')

@section('content')

                <?php
                
                
                
                $label = "Create";
                
                $client_id = "";
                $policy_type_id = "";
                $policy_id = "";
                $premium_price = "";
                $start_date = "";
                $next_premium_date = "";
                $holder_name = "";
                	$holder_id_proof_photo = asset('adminpanel/images/default-user.jpg');               
                $holder_birth_date = "";
                	$vehicle_photo = asset('adminpanel/images/default-user.jpg');
                $vehicle_no = "";
                $vehicle_engine_no = "";                
                $property_address = "";
                	$property_photo = asset('adminpanel/images/default-user.jpg');
                	$property_document_photo = asset('adminpanel/images/default-user.jpg'); 
                $agenc_id  = "";
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
                    $policy_type_id = $data['input']['policy_type_id'];
                    $policy_id = $data['input']['policy_id'];
                    $premium_price = $data['input']['premium_price'];
                    $start_date = $data['input']['start_date'];                    
                    $next_premium_date = $data['input']['next_premium_date'];
                    $holder_name = $data['input']['holder_name'];
                    $holder_birth_date = $data['input']['holder_birth_date'];
                    $vehicle_no = $data['input']['vehicle_no'];
                    $vehicle_engine_no = $data['input']['vehicle_engine_no'];
                    $property_address = $data['input']['property_address'];                    
                    $agenc_id = $data['input']['agenc_id'];
                    $agent_id = $data['input']['agent_id'];
                    
                    
                } else { 
                    if($data['type'] == "edit") {
                        $label = "Edit";
                        $client_id = $data['input'][0]->client_id;
                        $policy_type_id = $data['input'][0]->policy_type_id;
                        $policy_id = $data['input'][0]->policy_id;
                        $premium_price = $data['input'][0]->premium_price;
                        $start_date = $data['input'][0]->start_date;                        
                        $next_premium_date = $data['input'][0]->next_premium_date;
                        $holder_name = $data['input'][0]->holder_name;
                        $holder_birth_date = $data['input'][0]->holder_birth_date;
                        $vehicle_no = $data['input'][0]->vehicle_no;
                        $vehicle_engine_no = $data['input'][0]->vehicle_engine_no;
                        $property_address = $data['input'][0]->property_address;                        
                        $agenc_id = $data['input'][0]->agenc_id;
                        $agent_id = $data['input'][0]->agent_id;
                        
                        $id = $data['input'][0]->id;
                        
                        
                        $holder_id_proof_photo = $data['input'][0]->holder_id_proof_photo;
                        if($holder_id_proof_photo!="" && $holder_id_proof_photo!=null) {
                            if(file_exists(public_path()."/uploads/holder_id_proof_photo/".$holder_id_proof_photo)) {
                                $holder_id_proof_photo = asset('/uploads/holder_id_proof_photo/'.$holder_id_proof_photo);
                            }
                        }
                        
                        $vehicle_photo = $data['input'][0]->vehicle_photo;
                        if($vehicle_photo!="" && $vehicle_photo!=null) {
                            if(file_exists(public_path()."/uploads/pvehicle_photo/".$vehicle_photo)) {
                                $vehicle_photo = asset('/uploads/pvehicle_photo/'.$vehicle_photo);
                            }
                        }
                        
                        $property_photo = $data['input'][0]->property_photo;
                        if($property_photo!="" && $property_photo!=null) {
                            if(file_exists(public_path()."/uploads/property_photo/".$property_photo)) {
                                $property_photo = asset('/uploads/property_photo/'.$property_photo);
                            }
                        }
                        
                        $property_document_photo = $data['input'][0]->property_document_photo;
                        if($property_document_photo!="" && $property_document_photo!=null) {
                            if(file_exists(public_path()."/uploads/property_document_photo/".$property_document_photo)) {
                                $property_document_photo = asset('/uploads/property_document_photo/'.$property_document_photo);
                            }
                        }
                        
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
                                'agenc_id', $data['agenc_id']
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
                                                <label>Select Policy Type</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                            
                                            
                                                {{ Form::select(
                                                    'policy_type_id', 
                                                    $data['policytype'],
                                                    $policy_type_id, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Policy Type',
                                                        'required' => false,
                                                        'onchange' => 'ajaxSelectPolicyplan(this.value)',
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Select Policy Plan</label>
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
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Policy Premium Price</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'premium_price', $premium_price, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Policy Premium Price',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Policy Start Date</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                            {{ Form::text(
                                                    'start_date', $start_date, 
                                                    [
                                                        'class' => 'form-control',
                                                        'id' => 'start_date',
                                                        'placeholder' => 'Select Policy Start Date',
                                                        'required' => false,
                                                        'autocomplete' => 'off'
                                                    ]
                                                    ) 
                                                }}
                                            
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Policy Next Premium Date</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                            {{ Form::text(
                                                    'next_premium_date', $next_premium_date, 
                                                    [
                                                        'class' => 'form-control',
                                                        'id' => 'next_premium_date',
                                                        'placeholder' => 'Select Policy Next Premium Date',
                                                        'required' => false,
                                                        'autocomplete' => 'off'
                                                    ]
                                                    ) 
                                                }}
                                            
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Policy Holder Name</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'holder_name', $holder_name, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Policy Holder Name',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Policy Holder ID Proof Photo</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <div class="user-img-main" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <img src="{{ $holder_id_proof_photo }}" id="logoimg1" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                                                    <div class="button-wrapper">
                                                        <span class="label"><img src="{{ asset('adminpanel/images/pencil-edit-button.svg') }}"></span>
                                                        {{ Form::file(
                                                            'holder_id_proof_photo', 
                                                            [
                                                                'class' => 'upload-box',
                                                                'id' => 'holder_id_proof_photo',
                                                                'placeholder' => 'Select Holder ID Proof Photo',
                                                                'onchange' => 'displaySingleImagePreview(this, "logoimg1")'
                                                            ]
                                                            ) 
                                                        }}
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Policy Policy Holder Birthdate</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                            {{ Form::text(
                                                    'holder_birth_date', $holder_birth_date, 
                                                    [
                                                        'class' => 'form-control',
                                                        'id' => 'holder_birth_date',
                                                        'placeholder' => 'Select Policy Holder Birthdate',
                                                        'required' => false,
                                                        'autocomplete' => 'off'
                                                    ]
                                                    ) 
                                                }}
                                            
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one" id="vehicle_photo_div" <?php if($policy_type_id == 2){ echo ''; }else{ echo 'style="display: none;"'; } ?> >
                                            <div class="user-pro-detail-content-left">
                                                <label>Vehicle Photo</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <div class="user-img-main" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <img src="{{ $vehicle_photo }}" id="logoimg2" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                                                    <div class="button-wrapper">
                                                        <span class="label"><img src="{{ asset('adminpanel/images/pencil-edit-button.svg') }}"></span>
                                                        {{ Form::file(
                                                            'vehicle_photo', 
                                                            [
                                                                'class' => 'upload-box',
                                                                'id' => 'vehicle_photo',
                                                                'placeholder' => 'Select Vehicle Photo',
                                                                'onchange' => 'displaySingleImagePreview(this, "logoimg2")'
                                                            ]
                                                            ) 
                                                        }}
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one" id="vehicle_no_div" <?php if($policy_type_id == 2){ echo ''; }else{ echo 'style="display: none;"'; } ?>>
                                            <div class="user-pro-detail-content-left">
                                                <label>Vehicle No.</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'vehicle_no', $vehicle_no, 
                                                    [
                                                        'class' => 'form-control',
                                                        'id' => 'vehicle_no', 
                                                        'placeholder' => 'Enter Vehicle No.',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one" id="vehicle_engine_no_div" <?php if($policy_type_id == 2){ echo ''; }else{ echo 'style="display: none;"'; } ?>>
                                            <div class="user-pro-detail-content-left">
                                                <label>Vehicle Engine No.</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'vehicle_engine_no', $vehicle_engine_no, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'id' => 'vehicle_engine_no', 
                                                        'placeholder' => 'Enter Vehicle Engine No.',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one" id="property_address_div" <?php if($policy_type_id == 3){ echo 'style="display: block;"'; }else{ echo 'style="display: none;"'; } ?>>
                                            <div class="user-pro-detail-content-left">
                                                <label>Property Address</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'property_address', $property_address, 
                                                    [
                                                        'class' => 'form-control',
                                                        'id' => 'property_address', 
                                                        'placeholder' => 'Enter Property Address',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one" id="property_photo_div" <?php if($policy_type_id == 3){ echo 'style="display: block;"'; }else{ echo 'style="display: none;"'; } ?>>
                                            <div class="user-pro-detail-content-left">
                                                <label>Property Photo</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <div class="user-img-main" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <img src="{{ $property_photo }}" id="logoimg3" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                                                    <div class="button-wrapper">
                                                        <span class="label"><img src="{{ asset('adminpanel/images/pencil-edit-button.svg') }}"></span>
                                                        {{ Form::file(
                                                            'property_photo', 
                                                            [
                                                                'class' => 'upload-box',
                                                                'id' => 'property_photo',
                                                                'placeholder' => 'Select Property Photo',
                                                                'onchange' => 'displaySingleImagePreview(this, "logoimg3")'
                                                            ]
                                                            ) 
                                                        }}
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
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
               