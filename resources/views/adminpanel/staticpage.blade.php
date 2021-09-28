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

            @include('adminpanel.include.sidebar')

            <div class="dashboard-right-side-main">
                
                @include('adminpanel.include.header')
                
                <?php
                $label = "Update";
                $page_title = "";
                $short_description = "";
                $description = "";
                $id = "";
                $isError = false;
                $formURL = route('adminpanel.staticpage.updatepage');
                $picture = asset('adminpanel/images/default-user.jpg');
                
                if(isset($data['error'])) {
                    $isError = true;
                    $page_title = $data['pagedata']['page_title'];
                    $short_description = $data['pagedata']['short_description'];
                    $description = $data['pagedata']['description'];
                } else { 
                    if($data['type'] == "edit") {
                        $page_title = $data['pagedata'][0]->page_title;
                        $short_description = $data['pagedata'][0]->short_description;
                        $description = $data['pagedata'][0]->description;
                        $id = $data['pagedata'][0]->id;
                        $picture1 = $data['pagedata'][0]->picture;
                        if($picture1!="" && $picture1!=null) {
                            if(file_exists(public_path()."/uploads/staticpage_images/".$picture1)) {
                                $picture = asset('uploads/staticpage_images/'.$picture1);
                            }
                        }
                    }
                }
                ?>
                <div class="top-dashboard-title">
                    <div class="d-code-main">
                        <div class="d-title">
                            <h4><strong>{{ $label }} Staticpage</strong><span>|</span>Enter staticpage details and submit </h4>
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
                            <input name="id" type="hidden" value="{{ $id }}"/>
                            <div class="user-pro-detail-main-content">
                                <div class="user-pro-detail-sub-content">
                                    <div class="user-pro-detail-main-content-title">
                                        <h1>Static page management:</h1>
                                    </div>
                                    <div class="user-pro-detail-content">
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Page information image</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <div class="user-img-main" style="display: flex; flex-direction: row; align-items: center; justify-content: center;">
                                                    <img src="{{ $picture }}" id="useimg" style="max-width: 100%; max-height: 100%; width: auto; height: auto;">
                                                    <div class="button-wrapper">
                                                        <span class="label"><img src="{{ asset('adminpanel/images/pencil-edit-button.svg') }}"></span>
                                                        <input type="file" name="picture" id="upload" class="upload-box" placeholder="Upload File" onchange="displaySingleImagePreview(this, 'useimg')">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Page title</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <input type="text" placeholder="Enter page title" name="page_title" class="form-control" value="{{ $page_title }}">
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Short Description</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <textarea placeholder="Enter Short description" name="short_description" class="form-control">{{ $short_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="user-pro-detail-content-dt-one">
                                            <div class="user-pro-detail-content-left">
                                                <label>Page description</label>
                                            </div>
                                            <div class="user-pro-detail-content-right">
                                                <textarea name="description">{{ $description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="next-step-btn-main">
                                        <button type="submit" class="next-step">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @include('adminpanel.include.footer')

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