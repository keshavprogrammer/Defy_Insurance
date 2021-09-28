@extends('subagentpanel.default.master')
 
@section('title', 'Sub Agent Panel - Defy Insurance')

@section('content')
                
                <?php
                $label = "Update";
                
                $name = "";
                $phone = "";
                $email = "";
                $password = "";
                $address = "";
                $city = "";
                $state = "";
                $zip = "";
                $country = "";                
                $birth_date = "";
                $join_date = "";
                $agenc_id  = "";
                $agent_id  = "";
                $status = false;
                $id = "";
                $isError = false;
                $formURL = route('subagentpanel.setting.updatesetting');
                
                
                
                if(isset($data['error'])) {
                    $isError = true;
                    
                    $name = $data['pagedata']['name'];                    
                    $email = $data['pagedata']['email'];
                    $phone = $data['pagedata']['phone'];
                    $password = $data['pagedata']['password'];
                    $address = $data['pagedata']['address'];                    
                    $city = $data['pagedata']['city'];
                    $state = $data['pagedata']['state'];
                    $zip = $data['pagedata']['zip'];
                    $country = $data['pagedata']['country'];
                    $birth_date = $data['pagedata']['birth_date'];
                    $join_date = $data['pagedata']['join_date'];                    
                    $agenc_id = $data['pagedata']['agenc_id'];
                    $agent_id = $data['pagedata']['agent_id'];
                    $status = $data['pagedata']['status'];
                                       
                    
                   
                } else { 
                    if($data['type'] == "edit") {
                    	
                        $name = $data['pagedata'][0]->name;
                        $email = $data['pagedata'][0]->email;
                        $phone = $data['pagedata'][0]->phone;
                        $password = $data['pagedata'][0]->password;
                        $address = $data['pagedata'][0]->address;                        
                        $city = $data['pagedata'][0]->city;
                        $state = $data['pagedata'][0]->state;
                        $zip = $data['pagedata'][0]->zip;
                        $country = $data['pagedata'][0]->country;
                        $birth_date = $data['pagedata'][0]->birth_date;
                        $join_date = $data['pagedata'][0]->join_date;                        
                        $agenc_id = $data['pagedata'][0]->agenc_id;
                        $agent_id = $data['pagedata'][0]->agent_id;
                        
                        $status = $data['pagedata'][0]->status;
                        $id = $data['pagedata'][0]->id;
                        $photo = $data['pagedata'][0]->photo;
                        if($photo!="" && $photo!=null) {
                            if(file_exists(public_path()."/uploads/subagent_logo/".$photo)) {
                                $photo = asset('/uploads/subagent_logo/'.$photo);
                            }
                        }
                        
                        
                    }
                }
                ?>
                <div class="top-dashboard-title">
                    <div class="d-code-main">
                        <div class="d-title">
                            <h4><strong>{{ $label }} Setting</strong><span>|</span>Enter setting details and submit </h4>
                        </div>
                    </div>
                    <!-- <div class="action-btn">
                        <a href="#" class="btn-main">Actions<span><img src="images/b.png"></span></a>
                    </div> -->
                </div>

                <div class="dashboard-content-main add-user-main">
                    <div class="add-user-one-main-content">
                        <div class="add-user-one-main-content-top">
                            @if(session()->has('success'))
                                <div class="success-message-box">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if($isError)
                                <div class="error-message-box">
                                    <?php foreach($data['error']->all() as $error) {
                                        echo "<p>". $error . "</p>";
                                    } ?>
                                </div>
                            @endif
                        </div>
                        <form method="post" action="{{ $formURL }}" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            {{ Form::hidden(
                                'id', $id
                                ) 
                            }}
                            
                            <div class="user-pro-detail-main-content">
                                <div class="user-pro-detail-sub-content">
                                    <div class="user-pro-detail-main-content-title">
                                        <h1>Setting management:</h1>
                                    </div>
                                    <div class="user-pro-detail-content">
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Agent Photo</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <div class="user-img-main" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <img src="{{ $photo }}" id="logoimg" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                                                    <div class="button-wrapper">
                                                        <span class="label"><img src="{{ asset('adminpanel/images/pencil-edit-button.svg') }}"></span>
                                                        {{ Form::file(
                                                            'photo', 
                                                            [
                                                                'class' => 'upload-box',
                                                                'id' => 'photo',
                                                                'placeholder' => 'Select Photo',
                                                                'onchange' => 'displaySingleImagePreview(this, "logoimg")'
                                                            ]
                                                            ) 
                                                        }}
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Name</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'name', $name, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Name',
                                                        'required' => true
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
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter password</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::password(
                                                    'password',  
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter password',
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
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Birth Date</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                            {{ Form::text(
                                                    'birth_date', $birth_date, 
                                                    [
                                                        'class' => 'form-control',
                                                        'id' => 'birth_date',
                                                        'placeholder' => 'Select Birth Date',
                                                        'required' => false,
                                                        'autocomplete' => 'off'
                                                    ]
                                                    ) 
                                                }}
                                            
                                                
                                            </div>
                                        </div>
                                                                                
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Address (street address)</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'address', $address, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter address',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter City</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'city', $city, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter city',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter State</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'state', $state, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter state',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter zip</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'zip', $zip, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter zip',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Country</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'country', $country, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Country',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Join Date</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'join_date', $join_date, 
                                                    [
                                                        'class' => 'form-control',
                                                        'id' => 'join_date', 
                                                        'placeholder' => 'Enter Join Date',
                                                        'required' => false,
                                                        'autocomplete' => 'off'
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
                        </form>
                    </div>
                </div>

                @endsection