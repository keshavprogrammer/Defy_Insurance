@extends('agencypanel.default.master')
 
@section('title', 'Manage Client Policies ')

@section('content')

                <div class="top-dashboard-title">
                    <div class="d-code-main listing-page-head-src">
                        <div class="d-title">   
                            <h4><strong>Client Policies</strong><span>|</span>{{ $data->total() }} Total</h4>
                            <div class="input-group md-form form-sm form-2 pl-0">
                            
                                <form method="get" action="{{ url('/agencypanel/searchclientpolicy/'.$cid) }}" enctype="multipart/form-data" style="display: flex;" id="search_form">
                                    <input class="form-control my-0 py-1" type="text" name="search" placeholder="Search..." aria-label="Search">
                                    <div class="input-group-append">
                                        <span class="input-group-text lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
                                            aria-hidden="true"></i></span>
                                    </div>
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
                    <div class="action-btn listing-page-head-btn">
                        <a href="{{ url('/agencypanel/addclientpolicy/'.$cid) }}" class="btn-main">Add Client Policy</a>
                    </div>
                </div>
                        
                    
                <div class="w-100 m-4  mb-0 add-user-main listing-page-main">
                    <div class="add-user-one-main-content padding-zero">
                        <div class="ser-pro-detail-main-content">
                            <div class="user-pro-detail-sub-content">
                                <div class="user-pro-detail-content pt-3    " >
                                    <div class=" col-md-6">

                                        <div class="pb-1 user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label> First Name </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ $client->fname }}
                                            </div>
                                        </div>
                                        <div class="pb-1 user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label> Last Name </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ $client->lname }}
                                            </div>
                                        </div>
                                        <div class="pb-1 user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label> Email </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ $client->email }}
                                            </div>
                                        </div>
                                        <div class="pb-1 user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label> Contact No. </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ $client->phone }}
                                            </div>
                                        </div>
                                        <div class="pb-1 user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label> Birth Date </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ $client->birth_date }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="pb-1 user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label> Address </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ $client->address }}
                                            </div>
                                        </div>
                                        <div class="pb-1 user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label> City </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ $client->city }}
                                            </div>
                                        </div>
                                        <div class="pb-1 user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label> State </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ $client->state }}
                                            </div>
                                        </div>
                                        <div class="pb-1 user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label> Zip </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ $client->zip }}
                                            </div>
                                        </div>
                                        <div class="pb-1 user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label> Country </label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ $client->country }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        <th>Policy #</th>
                                        <th>Policy Status</th>
                                        <th>Premium</th>
                                        <th>Effective Date</th>
                                        <th>Expiration Date</th>
                                        <th>Actions</th>
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
                                                        <h1>{{ $d->policy }}</h1>
                                                    </span>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="user-name-main">
                                                    <span class="user-name">
                                                        <h1>{{ $d->policy_status }}</h1>
                                                    </span>
                                                </span>
                                            </td>
                                            <td>
                                                {{ $d->written_premium}}
                                            </td>
                                            <td>
                                                {{ $d->effective_date }}
                                            </td>
                                            <td>
                                                {{ $d->expiration_date}}
                                            </td>
                                            <td class="dropdown-td">
                                                <a href="javascript:;" data-toggle="dropdown"><img src="{{ asset('adminpanel/images/icon.png') }}"></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ url('/agencypanel/editclientpolicy/'.$cid.'/'.$d->id) }}"><span><i class="fas fa-edit"></i></span>Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="confirmDelete('Client Policy', '{{ url('/agencypanel/deleteclientpolicy/'.$d->client_id.'/'.$d->id) }}')"><span><i class="fas fa-trash-alt"></i></span>Delete</a>   
                                                </div>
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