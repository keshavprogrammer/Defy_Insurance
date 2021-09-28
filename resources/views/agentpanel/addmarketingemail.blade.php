@extends('agencypanel.default.master')
 
@section('title', 'Add/Edit Blog')

@section('content')

                <?php
                $label = "Create";
                
                $template_id = "";
                $subject = "";
                $description = "";
                $id = "";
                $isError = false;
                $formRoute = 'agencypanel.marketingemail.save';
                if(isset($data['error'])) {
                    $isError = true;
                    if($data['type']=="Edit") {
                        $label = "Edit";
                        $formRoute = 'agencypanel.marketingemail.update';
                    }
                    $template_id = $data['input']['template_id'];                    
                    $subject = $data['input']['subject'];
                    $description = $data['input']['description'];
                    
                } else { 
                    if($data['type'] == "edit") {
                        $label = "Edit";
                        $template_id = $data['input'][0]->template_id;
                        $subject = $data['input'][0]->subject;
                        $description = $data['input'][0]->description;
                        $id = $data['input'][0]->id;
                        $formRoute = 'agencypanel.marketingemail.update';
                    }
                } 
                ?>
                <div class="top-dashboard-title">
                    <div class="d-code-main">
                        <div class="d-title">
                            <h4><strong>{{ $label }} Marketing Email</strong><span>|</span>Enter Email details and submit </h4>
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
                            <div class="user-pro-detail-main-content">
                                <div class="user-pro-detail-sub-content">
                                    <div class="user-pro-detail-main-content-title">
                                        <h1>Marketing Email management:</h1>
                                    </div>
                                    <div class="user-pro-detail-content">
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Select Template</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::select(
                                                    'template_id', 
                                                    $data['templates'],
                                                    $template_id, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Select Template',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Subject</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'subject', $subject, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter subject',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Description</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <textarea name="description">{{ $description }}</textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Select Lead</label>
                                            </div>
                                            <div class="user-pro-detail-content-right" style="max-height: 500px; overflow: scroll;">
                                                <?php $leadcntr = 0; 
                                                    if(count($data["leads"])>0) { ?>
                                                        <label class="ki-checkbox" style="padding-left: 25px;">
                                                            {{ Form::checkbox('checkAllLeads', '1', false, [
                                                                'id' => 'checkAllLeads'
                                                            ]) }}
                                                            <span style="top:0px;"></span>
                                                            Check All
                                                        </label>
                                                    <?php }
                                                ?>
                                                @foreach($data["leads"] as $lead)
                                                    <?php $leadcntr++; ?>
                                                    <div style="width:auto; margin-right: 15px; width: 100%;">
                                                        <label class="ki-checkbox" style="padding-left: 25px;">
                                                            {{ Form::checkbox('leads[]', $lead->id, false, [
                                                                'id' => 'lead'.$leadcntr,
                                                                'onclick' => 'checkAllLeadChecks()'
                                                            ]) }}
                                                            <span style="top:0px;"></span>
                                                            {{ $lead->fname . ' ' . $lead->lname }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                                {{ Form::hidden(
                                                    "lcounter",
                                                    $leadcntr, 
                                                    [
                                                        "id" => "lcounter"
                                                    ]) 
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
               