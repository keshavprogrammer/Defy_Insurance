@extends('subagentpanel.default.master')
 
@section('title', 'Add/Edit Client')

@section('content')

                <?php
                
                
                
                $label = "Create";
                
                $fname = "";
                $lname = "";
                $phone = "";
                $email = "";                
                $address = "";
                $city = "";
                $state = "";
                $zip = "";
                $country = "";                
                $birth_date = "";                
                $agenc_id  = "";
                $agent_id  = "";                
                $id = "";
                $isError = false;
                $formRoute = 'subagentpanel.client.save';
                if(isset($data['error'])) {
                    $isError = true;
                    if($data['type']=="Edit") {
                        $label = "Edit";
                        $formRoute = 'subagentpanel.client.update';
                    }
                    $fname = $data['input']['fname'];
                    $lname = $data['input']['lname'];                    
                    $email = $data['input']['email'];
                    $phone = $data['input']['phone'];                    
                    $address = $data['input']['address'];                    
                    $city = $data['input']['city'];
                    $state = $data['input']['state'];
                    $zip = $data['input']['zip'];
                    $country = $data['input']['country'];
                    $birth_date = $data['input']['birth_date'];                    
                    $agenc_id = $data['input']['agenc_id'];
                    $agent_id = $data['input']['agent_id'];
                    
                } else { 
                    if($data['type'] == "edit") {
                        $label = "Edit";
                        $fname = $data['input'][0]->fname;
                        $lname = $data['input'][0]->lname;
                        $email = $data['input'][0]->email;
                        $phone = $data['input'][0]->phone;                        
                        $address = $data['input'][0]->address;                        
                        $city = $data['input'][0]->city;
                        $state = $data['input'][0]->state;
                        $zip = $data['input'][0]->zip;
                        $country = $data['input'][0]->country;
                        $birth_date = $data['input'][0]->birth_date;                        
                        $agenc_id = $data['input'][0]->agenc_id;
                        $agent_id = $data['input'][0]->agent_id;                        
                        $id = $data['input'][0]->id;
                        $formRoute = 'subagentpanel.client.update';
                    }
                    
                } 
                ?>
                <div class="top-dashboard-title">
                    <div class="d-code-main">
                        <div class="d-title">
                            <h4><strong>{{ $label }} Client</strong><span>|</span>Enter Client details and submit </h4>
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
                                        <h1>Client management:</h1>
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
                                                        'required' => true
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
               