@extends('agencypanel.default.master')
 
@section('title', 'Add/Edit Channel Partner')

@section('content')

                <?php
                $label = "Create";
                
                $name = "";
                $phone = "";
                $email = "";
                $password = "";
                $address = "";
                $city = "";
                $state = "";
                $zip = "";
                $country = "";
                $agenc_id  = "";
                $contact_name = "";
                $contact_email = "";
                $contact_phone = "";
                $status = false;
                $id = "";
                $isError = false;
                $formRoute = 'agencypanel.channel_partner.save';
                $photo = asset('adminpanel/images/default-user.jpg');
                if(isset($data['error'])) {
                    $isError = true;
                    if($data['type']=="Edit") {
                        $label = "Edit";
                        $formRoute = 'agencypanel.channel_partner.update';
                    }
                    $name = $data['input']['name'];                    
                    $email = $data['input']['email'];
                    $phone = $data['input']['phone'];
                    $password = $data['input']['password'];
                    $address = $data['input']['address'];                    
                    $city = $data['input']['city'];
                    $state = $data['input']['state'];
                    $zip = $data['input']['zip'];
                    $country = $data['input']['country'];
                    $contact_name = $data['input']['contact_name'];
                    $contact_email = $data['input']['contact_email'];
                    $contact_phone = $data['input']['contact_phone'];                    
                    $agenc_id = $data['input']['agenc_id'];
                    $status = $data['input']['status'];
                    
                } else { 
                    if($data['type'] == "edit") {
                        $label = "Edit";
                        $name = $data['input'][0]->name;
                        $email = $data['input'][0]->email;
                        $phone = $data['input'][0]->phone;
                        $password = $data['input'][0]->password;
                        $address = $data['input'][0]->address;                        
                        $city = $data['input'][0]->city;
                        $state = $data['input'][0]->state;
                        $zip = $data['input'][0]->zip;
                        $country = $data['input'][0]->country;
                        $contact_name = $data['input'][0]->contact_name;
                        $contact_email = $data['input'][0]->contact_email;
                        $contact_phone = $data['input'][0]->contact_phone;
                        $agenc_id = $data['input'][0]->agenc_id;
                        $status = $data['input'][0]->status;
                        $id = $data['input'][0]->id;
                        $photo = $data['input'][0]->photo;
                        if($photo!="" && $photo!=null) {
                            if(file_exists(public_path()."/uploads/channel_partner/".$photo)) {
                                $photo = asset('/uploads/channel_partner/'.$photo);
                            }
                        }
                        $formRoute = 'agencypanel.channel_partner.update';
                    }
                    if($status==1) {
                    	$status = true;
                	}
                } 
                ?>
                <div class="top-dashboard-title">
                    <div class="d-code-main">
                        <div class="d-title">
                            <h4><strong>{{ $label }} Channel Partner</strong><span>|</span>Enter Channel Partner details and submit </h4>
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
                                        <h1>Channel Partner management:</h1>
                                    </div>
                                    <div class="user-pro-detail-content">
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Channel Partner Photo</label>
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
                                                <label>Enter Contact Person Name</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'contact_name', $contact_name, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Contact Person Name',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Contact Person Email</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'contact_email', $contact_email, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Contact Person Email',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Contact Person Phone No.</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'contact_phone', $contact_phone, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Contact Person Phone No.',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>W9 Information</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <button type="button" class="btn btn-dark">Select PDF</button>
                                                {{ Form::file(
                                                    'w9_file', 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select PDF',
                                                        "accept"=>"application/pdf",
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>License</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <button type="button" class="btn btn-dark">Select PDF</button>
                                                {{ Form::file(
                                                    'license_file', 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select PDF',
                                                        "accept"=>"application/pdf",
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>

                                         
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>E&O information</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <button type="button" class="btn btn-dark">Select PDF</button>
                                                {{ Form::file(
                                                    'eno_file', 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select PDF',
                                                        "accept"=>"application/pdf",
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Is Active</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <label class="ki-checkbox">
                                                    {{ Form::checkbox('status', 1, $status) }}
                                                    <span style="top:-5px;"></span>
                                                </label>
                                                
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
               