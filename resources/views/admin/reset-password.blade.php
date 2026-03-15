<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Reset Password Page</title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" />

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" 
          rel="stylesheet" 
          type="text/css">

    <link id="beyond-link" href="{{ asset('assets/css/beyond.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <script src="{{ asset('assets/js/skins.min.js') }}"></script>
</head>

<body>

    <div class="login-container animated fadeInDown forgot-password-container">
        <div class="loginbox bg-white">
            <div class="forgot-password-content">
                <img src="{{ asset('assets/img/website_log.webp')}}" alt="">
                <div class="loginbox-title"></div>
                                <img src="{{ asset('assets/img/forgot-password-top-img.png')}}" class="forgot-password-top-img" alt="">
             @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $e)
            <div>{{ $e }}</div>
        @endforeach
    </div>
@endif


<form method="POST" action="{{ route('admin.password.reset') }}">
        @csrf

        <input type="password" name="password"
               class="form-control mb-2"
               placeholder="New Password" required>

        <input type="password" name="password_confirmation"
               class="form-control mb-2"
               placeholder="Confirm Password" required>

        <button class="btn btn-primary otp-btn">
            Reset Password
        </button>
    </form>

            </div>  
        </div>
       
    </div>
       <script src="{{ asset('assets/js/jquery-2.0.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/beyond.js') }}"></script>
</body>
</html>



@push('scripts')
<script>
$('#emailForm').submit(function(e){
    e.preventDefault();

    $.post("{{ route('admin.password.sendOtp') }}", $(this).serialize())
    .done(() => {
        $('#emailForm').hide();
        $('#otpForm').removeClass('d-none');
    })
    .fail(res => {
        $('#alertBox').html(
            `<div class="alert alert-danger">${res.responseJSON.message}</div>`
        );
    });
});

$('#otpForm').submit(function(e){
    e.preventDefault();

    $.post("{{ route('admin.password.verifyOtp') }}", $(this).serialize())
    .done(() => {
        window.location.href = "{{ route('admin.password.reset.form') }}";
    })
    .fail(res => {
        $('#alertBox').html(
            `<div class="alert alert-danger">${res.responseJSON.message}</div>`
        );
    });
});
</script>
@endpush
