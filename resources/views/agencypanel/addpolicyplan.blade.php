@extends('agencypanel.default.master')
 
@section('title', 'Add/Edit Policy Plan')

@section('content')

                <?php
                $label = "Create";
                
                $title = "";
                $description = "";
                $published_date = "";
                $policy_type_id  = "";                
                $status = false;
                $id = "";
                $isError = false;
                $agenc_id  = "";
                $formRoute = 'agencypanel.policyplan.save';
                $clogo = asset('adminpanel/images/default-user.jpg');
                if(isset($data['error'])) {
                    $isError = true;
                    if($data['type']=="Edit") {
                        $label = "Edit";
                        $formRoute = 'agencypanel.policyplan.update';
                    }
                    $title = $data['input']['title'];                    
                    $description = $data['input']['description'];
                    $published_date = $data['input']['published_date'];
                    $policy_type_id = $data['input']['policy_type_id'];                    
                    $status = $data['input']['status'];
                    $agenc_id = $data['input']['agenc_id'];
                    
                } else { 
                    if($data['type'] == "edit") {
                        $label = "Edit";
                        $title = $data['input'][0]->title;
                        $description = $data['input'][0]->description;
                        $published_date = $data['input'][0]->published_date;                        
                        $policy_type_id  = $data['input'][0]->policy_type_id;
                        $status = $data['input'][0]->status;
                        $id = $data['input'][0]->id;
                        $agenc_id = $data['input'][0]->agenc_id;
                        $logo = $data['input'][0]->logo;
                        if($logo!="" && $logo!=null) {
                            if(file_exists(public_path()."/uploads/policyplan_logo/".$logo)) {
                                $clogo = asset('/uploads/policyplan_logo/'.$logo);
                            }
                        }
                        $formRoute = 'agencypanel.policyplan.update';
                    }
                    if($status==1) {
                    	$status = true;
                	}
                } 
                ?>
                <div class="top-dashboard-title">
                    <div class="d-code-main">
                        <div class="d-title">
                            <h4><strong>{{ $label }} Policy Plan</strong><span>|</span>Enter policy plan details and submit </h4>
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
                                        <h1>Policy Plan management:</h1>
                                    </div>
                                    <div class="user-pro-detail-content">
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Select Logo</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <div class="user-img-main" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <img src="{{ $clogo }}" id="logoimg" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                                                    <div class="button-wrapper">
                                                        <span class="label"><img src="{{ asset('adminpanel/images/pencil-edit-button.svg') }}"></span>
                                                        {{ Form::file(
                                                            'logo', 
                                                            [
                                                                'class' => 'upload-box',
                                                                'id' => 'logo',
                                                                'placeholder' => 'Select Logo',
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
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Title</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'title', $title, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter title',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Description</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::textarea(
                                                    'description', $description, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Description',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Published Date</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                            {{ Form::text(
                                                    'published_date', $published_date, 
                                                    [
                                                        'class' => 'form-control',
                                                        'id' => 'published_date',
                                                        'placeholder' => 'Select Published Date',
                                                        'required' => false,
                                                        'autocomplete' => 'off'
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

<script>
        CKEDITOR.replace( 'description' );
    </script>
    

@endsection
                