<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - IO Psychics</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontassets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontassets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontassets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontassets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontassets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontassets/css/jquery.timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontassets/css/mediaelementplayer.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontassets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontassets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontassets/css/google-fonts.css') }}">
    <link rel="shortcut icon" href="{{ asset('frontassets/images/buttonstar.webp') }}">
</head>

   
<body>

    <!-- Header -->
    @include('frontend.header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('frontend.footer')

    @stack('scripts')
</body>
</html>
