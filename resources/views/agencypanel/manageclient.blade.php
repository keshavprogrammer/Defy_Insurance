@extends('agencypanel.default.master')
 
@section('title', 'Manage Clients')

@section('content')

                <div class="top-dashboard-title">
                    <div class="d-code-main listing-page-head-src">
                        <div class="d-title">
                            <h4><strong>Clients</strong><span>|</span>{{ $data->total() }} Total</h4>
                            <div class="input-group md-form form-sm form-2 pl-0">
                                <form method="get" action="{{ route('agencypanel.client.search') }}" enctype="multipart/form-data" style="display: flex;" id="search_form">
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
                        <a href="{{ route('agencypanel.client.add') }}" class="btn-main">Add Client</a>
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
                                        
                                        <th>Client Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
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
                                            <td class="dropdown-td">
                                                <a href="javascript:;" data-toggle="dropdown"><img src="{{ asset('adminpanel/images/icon.png') }}"></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ url('/agencypanel/editclient/'.$d->id) }}"><span><i class="fas fa-edit"></i></span>Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="confirmDelete('Client', '{{ url('/agencypanel/deleteclient/'.$d->id) }}')"><span><i class="fas fa-trash-alt"></i></span>Delete</a>
                                                    <a class="dropdown-item" href="{{ url('/agencypanel/manageclientpolicy/'.$d->id) }}" ><span><i class="fas fa-edit"></i></span>Manage Policy </a>
                                                    
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