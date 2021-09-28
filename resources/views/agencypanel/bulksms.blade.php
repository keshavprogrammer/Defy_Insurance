@extends('agencypanel.default.master')
 
@section('title', 'Bulk SMS')

@section('content')
                <?php
                    $agenc_id = "";
                    $agent_id = "";
                    $formRoute = 'agencypanel.bulksms.save';
                ?>
                <div class="top-dashboard-title">
                    <div class="d-code-main listing-page-head-src">
                        <div class="d-title">
                            <h4><strong>Bulk SMS </strong><span>|</span> </h4>
                            <div class="input-group md-form form-sm form-2 pl-0" style="width: 100%;">
                                {{ Form::open(array('route' => $formRoute, 'method' => 'post', 'enctype' => 'multipart/form-data')) }}
                            
                                   <!--  <div class="input-group md-form form-sm form-2 pl-0" style="float: left; margin-right: 5px;">
                                        {{ Form::select(
                                            'agency_select[]', 
                                            $data['agency'],
                                            '0', 
                                            [
                                                'class' => 'form-control', 
                                                'placeholder' => 'All Agency',
                                                'required' => true,
                                                'multiple' => true,
                                                'size' => 4
                                            ]
                                            ) 
                                        }}
                                    </div> -->
                                    <div class="input-group md-form form-sm form-2 pl-0" style="float: left; margin-right: 5px;">
                                        {{ Form::select(
                                            'agent_select[]', 
                                            $data['agent'],
                                            '0', 
                                            [
                                                'class' => 'form-control', 
                                                'placeholder' => 'All Agent',
                                                'required' => true,
                                                'multiple' => true,
                                                'size' => 4
                                            ]
                                            ) 
                                        }}
                                    </div>
                                     <div class="input-group md-form form-sm form-2 pl-0" style="float: left; margin-right: 5px;">
                                        {{ Form::select(
                                            'subagent_select[]', 
                                            $data['subagent'],
                                            '0', 
                                            [
                                                'class' => 'form-control', 
                                                'placeholder' => 'All Agent',
                                                'required' => true,
                                                'multiple' => true,
                                                'size' => 4
                                            ]
                                            ) 
                                        }}
                                    </div>
                                     <div class="input-group md-form form-sm form-2 pl-0" style="float: left; margin-right: 5px;">
                                        {{ Form::select(
                                            'chanel_partner_select[]', 
                                            $data['chanel_partner'],
                                            '0', 
                                            [
                                                'class' => 'form-control', 
                                                'placeholder' => 'All Chanel Partner',
                                                'required' => true,
                                                'multiple' => true,
                                                'size' => 4
                                            ]
                                            ) 
                                        }}
                                    </div>
                                     <div class="input-group md-form form-sm form-2 pl-0" style="float: left; margin-right: 5px;">
                                        {{ Form::select(
                                            'chanel_partner_user_select[]', 
                                            $data['chanel_partner_user'],
                                            '0', 
                                            [
                                                'class' => 'form-control', 
                                                'placeholder' => 'All Chanel Partner User',
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