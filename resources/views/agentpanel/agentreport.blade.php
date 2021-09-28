@extends('agentpanel.default.master')
 
@section('title', 'Agent Report')

@section('content')

                <div class="top-dashboard-title">
                    <div class="d-code-main listing-page-head-src">
                        <div class="d-title">
                            <h4><strong>Agent Reports </strong><span>|</span>{{ $data->total() }} Total</h4>
                            <div class="input-group md-form form-sm form-2 pl-0" style="width: 100%;">
                            
                            	<?php
	                            if(isset($input['report_type']) && $input['report_type'] != "") { $report_type = $input['report_type']; } else { $report_type = ""; }
	                            if(isset($input['startDate']) && $input['startDate'] != "") { $startDate = $input['startDate']; } else { $startDate = ""; }
	                            
	                            if(isset($input['endDate']) && $input['endDate'] != "") { $endDate = $input['endDate']; } else { $endDate = ""; }
	                            
	                            ?>
                            
                 {{ Form::open(array('route' => 'agentpanel.agentreport.search', 'method' => 'get')) }}
                            
                            <div class="input-group md-form form-sm form-2 pl-0" style="float: left; margin-right: 5px;">
            <select class="form-control" id="report_type" name="report_type">
            	<option <?php if($report_type == 1){?> selected="selected" <?php } ?> value="1">Leads</option>
            	<option <?php if($report_type == 2){?> selected="selected" <?php } ?> value="2">Opportunity</option>
            	<option <?php if($report_type == 3){?> selected="selected" <?php } ?> value="3">Sales</option>
            </select>
                            </div>                            
                            <div class="filter-range-picker" style="float: left;">
                                <div class="user-pro-detail-content-right com-input">
                                    <div class="daterange">
                                        {{ Form::text(
                                            'startDate', $startDate, 
                                            [
                                                'class' => 'form-control',
                                                'id' => 'startDate',
                                                'placeholder' => 'From Date',
                                                'required' => false,
                                                'autocomplete' => 'off'
                                            ]
                                            ) 
                                        }}
                                        
                                        {{ Form::text(
                                            'endDate', $endDate, 
                                            [
                                                'class' => 'form-control',
                                                'id' => 'endDate',
                                                'placeholder' => 'To Date',
                                                'required' => false,
                                                'autocomplete' => 'off'
                                            ]
                                            ) 
                                        }}
                                                
                                       
                                    </div>
                                </div>
                            </div>
                            
                                
                            <div class="input-group md-form form-sm form-2 pl-0" style="float: left; margin-right: 5px;">
	                            {{ Form::button(
	                                'Search',
	                                [
	                                    'class' => 'next-step',
	                                    'type' => 'submit'
	                                ]
	                                )
	                            }}
                            </div>
                            
                            {{ Form::close() }}
                                </form>
                            </div>
                            <div class="filter-range-picker">
                                <!-- <div class="user-pro-detail-content-right com-input">
                                    <div class="daterange">
                                        <input id="startDate" type="text" class="form-control" name="start" placeholder="Start Date">
                                        <input id="endDate" type="text" class="form-control" name="end" placeholder="End Date">
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>                    
                </div>

                <div class="dashboard-content-main add-user-main listing-page-main">
                    <div class="add-user-one-main-content padding-zero">
                        @if(session()->has('success'))
                            <div class="success-message-box">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="error-message-box">                    
                                <p>{{$errors->first()}}</p>
                            </div>
                        @endif
                        <div class="data-table-main">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <?php if($input['report_type'] == 1 OR $input['report_type'] == 2) {?>
                                        <th>Notes</th>
                                        <?php } else { ?>
                                        <th>Birth Date</th>
                                        <th>Location</th>
                                        <?php } ?>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 0; ?>
                                    @foreach ($data as $d) 
                                        <?php $counter++; ?>
                                        <tr>
                                            <td>{{ $counter }}
                                            </td>                                            
                                            <td>
                                                <span class="user-name-main">
                                                    <span class="user-name">
                                                        <h1>{{ $d->fname }} {{ $d->lname }}</h1>
                                                    </span>
                                                </span>
                                            </td>
                                            <td>
                                                {{ $d->email}}
                                            </td>
                                            <td>
                                                {{ $d->phone}}
                                            </td>
                                            <?php if($input['report_type'] == 1 OR $input['report_type'] == 2) {?>
                                            <td>
                                                {{ $d->notes}}
                                            </td>
                                            <?php } else {?>
                                            <td>
                                                {{ $d->birth_date}}
                                            </td>
                                            <td>
                                                {{ $d->address}},{{ $d->city}},<br/>
                                                {{ $d->zip}},{{ $d->state}},{{ $d->country}}
                                            </td>
                                            <?php } ?>
                                            <td>
                                                {{ $d->created_at}}
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="listing-page-main-bottom">
                            <div class="listing-page-main-bottom-left">
                                {{ $data->render() }}
                            </div>
                            <div class="listing-page-main-bottom-right">
                                <div class="listing-page-main-bottom-right-drop-down">
                                    <!-- <select class="classic arrow">
                                        <option value="1">10</option>
                                        <option value="1">10</option>
                                        <option value="1">10</option>
                                        <option value="1">10</option>
                                    </select> -->
                                </div>
                                <div class="listing-page-main-bottom-right-cnt">
                                    <p>Showing {{ $data->firstItem() }} - {{ $data->lastItem() }} of {{ $data->total() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
@endsection            