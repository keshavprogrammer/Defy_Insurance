@extends('partneruserpanel.default.master')
 
@section('title', 'Bulk SMS')

@section('content')
                <?php
                    $formRoute = 'partneruserpanel.bulksms.save';
                ?>
                <div class="top-dashboard-title">
                    <div class="d-code-main listing-page-head-src">
                        <div class="d-title">
                            <h4><strong>Bulk SMS </strong><span>|</span> </h4>
                            <div class="input-group md-form form-sm form-2 pl-0" style="width: 100%;">
                                {{ Form::open(array('route' => $formRoute, 'method' => 'post', 'enctype' => 'multipart/form-data')) }}
                                    <div class="input-group md-form form-sm form-2 pl-0" style="float: left; margin-right: 5px;">
                                        {{ Form::select(
                                            'lead_select[]', 
                                            $data['lead'],
                                            '0', 
                                            [
                                                'class' => 'form-control', 
                                                'placeholder' => 'All Lead',
                                                'required' => true,
                                                'multiple' => true,
                                                'size' => 4
                                            ]
                                            ) 
                                        }}
                                    </div>
                            </div>
                        </div>
                    </div>                    
                </div>

                <div class="dashboard-content-main add-user-main">
                    <div class="add-user-one-main-content">
                       
                            <div class="user-pro-detail-main-content">
                                <div class="user-pro-detail-sub-content">
                                    <div class="user-pro-detail-content">                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Message</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                 {{ Form::text(
                                                    'msg', '', 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Message',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="next-step-btn-main">
                                        {{ Form::button(
                                            'Send',
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