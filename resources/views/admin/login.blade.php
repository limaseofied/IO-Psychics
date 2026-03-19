<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>
    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" />

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <link id="beyond-link" href="{{ asset('assets/css/beyond.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/skins.min.js') }}"></script>
</head>
<body>
                    
    <div class="login-container animated fadeInDown login-page admin-login-container">
        
        <div class="loginbox admin-login-box">
            <div class="admin-login-box-content">
                <div class="login-website-logo">
                <img src="{{ asset('assets/img/website_log.webp')}}" alt="">
            </div>
            <div class="loginbox-title">ADMIN LOGIN </div>
            <div class="loginbox-social">
                <div class="social-title"></div>
                <div class="social-buttons">
                    

                </div>
            </div>
            <div class="loginbox-or">
                <div class="or-line"></div>
                <div class="or">OR</div>
            </div>
            <form method="POST" action="{{ route('admin.login.submit') }}"> 

                 @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

                     @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                        </div>
                    @endif
             @csrf
            <div class="loginbox-textbox">
                <input type="email" name="email" required class="form-control" placeholder="Email" />
            </div>
            <div class="loginbox-textbox">
                <input type="password" name="password" required class="form-control" placeholder="Password" />
            </div>
            @php
                     $captcha = \App\Helpers\CaptchaHelper::generate(8);
                  @endphp

                  <div class="mb-12 captcha-code">
                     <label class="form-label">
                        Enter CAPTCHA: 
                        <span class="captcha-box">
                            {{ $captcha }}
                            <a class="captcha-reload" href="javascript:void(0);" onclick="location.reload();">
                                <i class="fa fa-refresh"></i>
                            </a>
                        </span>
                     </label>

                     <input type="text" name="website" style="display:none">


                     <input type="text"
                           name="captcha"
                           class="form-control captcha-input-field"
                           placeholder="Enter above text"
                           required>

                           @error('captcha')
                              <small class="text-danger">{{ $message }}</small>
                           @enderror

                  </div>
            {{-- <div class="loginbox-forgot">
                <a href="">Forgot Password?</a>
            </div> --}}
            <div class="loginbox-submit">
                <input type="submit" class="btn btn-primary btn-block" value="Login">
            </div>
            </form>
           <a href="{{ route('admin.password.forgot') }}" class="text-primary forgot-pass-link">
                        Forgot Password?
                    </a>
            </div>
        </div>
       
    </div>
    <script src="{{ asset('assets/js/jquery-2.0.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/beyond.js') }}"></script>
</body>
</html>
