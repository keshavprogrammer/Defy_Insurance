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
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/gijgo.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/style2.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/responsive.css') }}" rel="stylesheet">
</head>

<body>

    <div id="sitemain">

        <!-- BEGIN :: DASHBOARD -->

        <div class="dashboard-main" id="dashboard">

            @include('agentpanel.include.sidebar')

            <div class="dashboard-right-side-main">
                
                @include('agentpanel.include.header')
                
                <?php
                $label = "Update";
                
                $name = "";
                $phone = "";
                $email = "";
                $password = "";
                $address = "";
                $city = "";
                $state = "";
                $zip = "";
                $country = "";
                $contact_name = "";
                $contact_email = "";
                $contact_phone = "";
                $theme_id = "";
                
                $id = "";
                $isError = false;
                $formURL = route('agentpanel.setting.updatesetting');
                
                
                
                if(isset($data['error'])) {
                    $isError = true;
                    
                    $name = $data['pagedata']['name'];                    
                    $email = $data['pagedata']['email'];
                    $phone = $data['pagedata']['phone'];
                    $password = $data['pagedata']['password'];
                    $address = $data['pagedata']['address'];                    
                    $city = $data['pagedata']['city'];
                    $state = $data['pagedata']['state'];
                    $zip = $data['pagedata']['zip'];
                    $country = $data['pagedata']['country'];
                    $birth_date = $data['pagedata']['birth_date'];
                    $join_date = $data['pagedata']['join_date'];                    
                    
                   
                } else { 
                    if($data['type'] == "edit") {
                    	                        
                        $name = $data['pagedata'][0]->name;
                        $email = $data['pagedata'][0]->email;
                        $phone = $data['pagedata'][0]->phone;
                        $password = $data['pagedata'][0]->password;
                        $address = $data['pagedata'][0]->address;                        
                        $city = $data['pagedata'][0]->city;
                        $state = $data['pagedata'][0]->state;
                        $zip = $data['pagedata'][0]->zip;
                        $country = $data['pagedata'][0]->country;
                        $birth_date = $data['pagedata'][0]->birth_date;
                        $join_date = $data['pagedata'][0]->join_date;
                        
                        $id = $data['pagedata'][0]->id;
                        $photo = $data['pagedata'][0]->photo;
                        if($photo!="" && $photo!=null) {
                            if(file_exists(public_path()."/uploads/agent_logo/".$photo)) {
                                $photo = asset('/uploads/agent_logo/'.$photo);
                            }
                        }
                        
                        
                    }
                }
                ?>
                <div class="top-dashboard-title">
                    <div class="d-code-main">
                        <div class="d-title">
                            <h4><strong>{{ $label }} Setting</strong><span>|</span>Enter setting details and submit </h4>
                        </div>
                    </div>
                    <!-- <div class="action-btn">
                        <a href="#" class="btn-main">Actions<span><img src="images/b.png"></span></a>
                    </div> -->
                </div>

                <div class="dashboard-content-main add-user-main">
                    <div class="add-user-one-main-content">
                        <div class="add-user-one-main-content-top">
                            @if(session()->has('success'))
                                <div class="success-message-box">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if($isError)
                                <div class="error-message-box">
                                    <?php foreach($data['error']->all() as $error) {
                                        echo "<p>". $error . "</p>";
                                    } ?>
                                </div>
                            @endif
                        </div>
                        <form method="post" action="{{ $formURL }}" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            {{ Form::hidden(
                                'id', $id
                                ) 
                            }}
                            
                            <div class="user-pro-detail-main-content">
                                <div class="user-pro-detail-sub-content">
                                    <div class="user-pro-detail-main-content-title">
                                        <h1>Setting management:</h1>
                                    </div>
                                    <div class="user-pro-detail-content">
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Agent Photo</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <div class="user-img-main" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <img src="{{ $photo }}" id="logoimg" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                                                    <div class="button-wrapper">
                                                        <span class="label"><img src="{{ asset('adminpanel/images/pencil-edit-button.svg') }}"></span>
                                                        {{ Form::file(
                                                            'photo', 
                                                            [
                                                                'class' => 'upload-box',
                                                                'id' => 'photo',
                                                                'placeholder' => 'Select Photo',
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
                                                <label>Enter Name</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'name', $name, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Name',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Email</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::email(
                                                    'email', $email, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Email',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter password</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::password(
                                                    'password',  
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter password',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Contact no.</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'phone', $phone, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Contact No.',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Birth Date</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                            {{ Form::text(
                                                    'birth_date', $birth_date, 
                                                    [
                                                        'class' => 'form-control',
                                                        'id' => 'birth_date',
                                                        'placeholder' => 'Select Birth Date',
                                                        'required' => false,
                                                        'autocomplete' => 'off'
                                                    ]
                                                    ) 
                                                }}
                                            
                                                
                                            </div>
                                        </div>
                                                                                
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Address (street address)</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'address', $address, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter address',
                                                        'required' => true
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter City</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'city', $city, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter city',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter State</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'state', $state, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter state',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter zip</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'zip', $zip, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter zip',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Country</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'country', $country, 
                                                    [
                                                        'class' => 'form-control', 
                                                        'placeholder' => 'Enter Country',
                                                        'required' => false
                                                    ]
                                                    ) 
                                                }}
                                            </div>
                                        </div>
                                        
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Enter Join Date</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                {{ Form::text(
                                                    'join_date', $join_date, 
                                                    [
                                                        'class' => 'form-control',
                                                        'id' => 'join_date', 
                                                        'placeholder' => 'Enter Join Date',
                                                        'required' => false,
                                                        'autocomplete' => 'off'
                                                    ]
                                                    ) 
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
                        </form>
                    </div>
                </div>

                @include('agentpanel.include.footer')

            </div>

        </div>

        <!-- END** :: DASHBOARD -->

    </div>

    <div class="index-top-text-main">
        <div class="container">
            <div class="row">
                <div class="index-top-text-sub">
                    <h1></h1>
                    <p></p>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('adminpanel/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="{{ asset('adminpanel/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminpanel/js/bootstrap-multiselectsplitter.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.2.5/jquery.bootstrap-touchspin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('adminpanel/js/slick.min.js') }}"></script>
    <script src="{{ asset('adminpanel/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('adminpanel/js/tagsinput.js') }}"></script>
    <script src="{{ asset('adminpanel/js/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('adminpanel/js/file-upload.js') }}"></script>
    <script src="{{ asset('adminpanel/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('adminpanel/js/custom.js') }}"></script>

    <script>
        CKEDITOR.replace( 'description' );
    </script>
</body>

</html>