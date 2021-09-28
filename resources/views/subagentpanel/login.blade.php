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
    <link href="{{ asset('adminpanel/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/responsive.css') }}" rel="stylesheet">
</head>
<body>

<div id="sitemain">

    <!-- BEGIN :: LOGIN -->

    <div class="login-main">
        <div class="login-left">
            <div class="login-desc">
                <h3>Welcome to Sub Agent Panel</h3>
                <p><!--The ultimate Bootstrap & Angular admin theme framework for next generation web apps.--></p>
            </div>
            <div class="l-logo">
                <img src="{{ asset('adminpanel/images/logo.png') }}">
            </div>
        </div>
        <div class="login-right">
            <div class="login-right-desc-main" id="login">
                <div class="title">
                    <h2>Sign In</h2>
                </div>
                <?php
                    $formURL = route('subagentpanel.submitlogin');
                ?>
                @if($errors->any())
                    <div class="error-message-box">                    
                        <p>{{$errors->first()}}</p>
                    </div>
                @endif
                @if(session()->has('username'))
                    <?php print_r(session()->all()); ?>
                @endif
                <form action="{{ $formURL }}" method="POST" id="logForm">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <div class="login-form-main">
                        <div class="login-form">
                            <input type="text" name="username" value="{{ old('username') }}" class="l-inp" placeholder="User Name">
                        </div>
                        <div class="login-form">
                            <input type="password" name="password" class="l-inp" placeholder="Password">
                        </div>
                        <div class="login-form login-check">
                            <label class="custom-check-label">Remember Me
                                <input type="checkbox" name="remember" value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="for-pass">
                            <a href="javascript:void(0)" id="showFP">Forgot Password ?</a>
                            <input type="submit" value="Login" class="submit-btn">
                        </div>
                    </div>
                </form>
            </div>
            <div class="login-right-desc-main" id="forgotPassword" style="display: none;">
                <div class="title">
                    <h2>Forgot Password</h2>
                </div>
                <div class="login-form-main">
                    <div class="login-form">
                        <input type="text" class="l-inp" placeholder="Enter email adress">
                    </div>
                    <div class="for-pass">
                        <a href="javascript:void(0)" id="showLogin">Login</a>
                        <input type="submit" value="Send" class="submit-btn">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END** :: LOGIN -->

</div>


<script src="{{ asset('adminpanel/js/jquery.min.js') }}"></script>
<script src="{{ asset('adminpanel/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('adminpanel/js/slick.min.js') }}"></script>

<script>
$(document).ready(function(){
    $('#menu-icon').click(function(){
        $(this).toggleClass('menu-open');
        $(".menu-main").slideToggle();
    });
});

$("#showFP").click(function() {
    $("#login").css("display","none");
    $("#forgotPassword").css("display","block");
});

$("#showLogin").click(function() {
    $("#forgotPassword").css("display","none");
    $("#login").css("display","block");
});
</script>
</body>
</html>