@extends('subagentpanel.default.master')
 
@section('title', 'Sub Agent Panel - Defy Insurance')

@section('content')
<div class="top-dashboard-title">
                <div class="d-code-main">
                    <div class="d-title">
                        <h4><strong>Dashboard</strong><!-- <span>|</span>#XRS-45670 --></h4>
                    </div>
                </div>
                <div class="action-btn">
                    <!-- <input id="datepicker" width="150" /> -->
                </div>
            </div>

            <div class="dashboard-content-main">
                <div class="dashboard-content-left-main" style="width: 100%;">
                    <div class="row">
                        
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="dashboard-chart-box" style="min-height: 120px;">
                                <div class="dashboard-chart-text">
                                	<h2>{{ $data['Leads'] }}</h2>
                                	<h6>Total Lead</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="dashboard-chart-box" style="min-height: 120px;">
                                <div class="dashboard-chart-text">
                                	<h2>{{ $data['Opportunity'] }}</h2>
                                	<h6>Total Opportunity</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="dashboard-chart-box" style="min-height: 120px;">
                                <div class="dashboard-chart-text">
                                	<h2>{{ $data['Client'] }}</h2>
                                	<h6>Total Client</h6>
                                </div>
                            </div>
                        </div>
                    
                        
                        
                        
                        
                    </div>
                </div>
                
            </div>
@endsection

