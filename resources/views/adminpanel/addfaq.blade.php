@extends('adminpanel.default.master')
 
@section('title', 'Add/Edit FAQ')

@section('content')

                <?php
                $label = "Create";
                
                $question = "";
                $description = "";
                                
                $status = false;
                $id = "";
                $isError = false;
                $formRoute = 'adminpanel.faq.save';
                
                if(isset($data['error'])) {
                    $isError = true;
                    if($data['type']=="Edit") {
                        $label = "Edit";
                        $formRoute = 'adminpanel.faq.update';
                    }
                    $question = $data['input']['question'];                    
                    $description = $data['input']['description'];
                    $status = $data['input']['status'];
                    
                } else { 
                    if($data['type'] == "edit") {
                        $label = "Edit";
                        $question = $data['input'][0]->question;
                        $description = $data['input'][0]->description;
                        $status = $data['input'][0]->status;
                        $id = $data['input'][0]->id;
                        
                        $formRoute = 'adminpanel.faq.update';
                    }
                    if($status==1) {
                    	$status = true;
                	}
                } 
                ?>
                <div class="top-dashboard-title">
                    <div class="d-code-main">
                        <div class="d-title">
                            <h4><strong>{{ $label }} FAQ</strong><span>|</span>Enter faq details and submit </h4>
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
                                        <h1>Policy Plan management:</h1>
                                    </div>
                                    <div class="user-pro-detail-content">
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Question</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'question', $question, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter question',
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
                