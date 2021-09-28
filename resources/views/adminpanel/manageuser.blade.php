<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('global.sitetitle') }} Adminpanel</title>
    <link href="{{ asset('adminpanel/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/highcharts.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('adminpanel/css/gijgo.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/responsive.css') }}" rel="stylesheet">
</head>
<body>

    <div id="sitemain">

        <!-- BEGIN :: DASHBOARD -->

        <div class="dashboard-main" id="dashboard">

        	@extends('adminpanel.include.sidebar')

            <div class="dashboard-right-side-main">

                @extends('adminpanel.include.header')

                <div class="top-dashboard-title">
                    <div class="d-code-main listing-page-head-src">
                        <div class="d-title">
                            <h4><strong>Users</strong><span>|</span>{{ $data->total() }} Total</h4>
                            <div class="input-group md-form form-sm form-2 pl-0">
                                <form method="get" action="{{ route('adminpanel.user.search') }}" enctype="multipart/form-data" style="display: flex;" id="search_form">
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
                        <a href="{{ route('adminpanel.user.add') }}" class="btn-main">Add User</a>
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
                                        <!-- <th id="th-check">
                                            <label class="custom-check-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th> -->
                                        <th>Name</th>
                                        <th>Email</th>
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
                                            <!-- <td id="td-check">
                                                <label class="custom-check-label">
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td> -->
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
                                            <td class="dropdown-td">
                                                <a href="javascript:;" data-toggle="dropdown"><img src="{{ asset('adminpanel/images/icon.png') }}"></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ url('/adminpanel/editagency/'.$d->id) }}"><span><i class="fas fa-edit"></i></span>Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)" onclick="confirmDelete('User', '{{ url('/adminpanel/deleteuser/'.$d->id) }}')"><span><i class="fas fa-trash-alt"></i></span>Delete</a>
                                                    <a class="dropdown-item" href="{{ url('/adminpanel/managechildren/'.$d->id) }}" ><span><i class="fas fa-trash-alt"></i></span>Manage Children</a>
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

                @include('adminpanel.include.footer')

            </div>

        </div>

        <!-- END** :: DASHBOARD -->

    </div>


    <script src="{{ asset('adminpanel/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{ asset('adminpanel/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminpanel/js/jquery.dataTables.min.js') }}" charset="UTF-8"></script>
    <script type="text/javascript" src="{{ asset('adminpanel/js/dataTables.bootstrap4.min.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('adminpanel/js/slick.min.js') }}"></script>
    <script src="{{ asset('adminpanel/js/highcharts.js') }}"></script>
    <script src="{{ asset('adminpanel/js/gijgo.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('adminpanel/js/custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );

        $('#startDate').datepicker({
            uiLibrary: 'bootstrap4'
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4'
        });

    </script>
</body>
</html>