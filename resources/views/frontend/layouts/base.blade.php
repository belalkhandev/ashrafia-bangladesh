<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    {{-- <meta name="title" content="@yield('meta_title', $meta_title)">
    <meta name="description" content="@yield('meta_description', $meta_description)">
    <meta name="keywords" content="@yield('meta_keywords', $meta_keywords)"> --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page_title', $page_title)</title>
    <!-- css plugins -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/aos/aos.css') }}">

    @stack('header-styles')

    <!-- main stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
</head>
<body>

    @yield('content.base')

    <!-- main js -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <!-- js plugins -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/aos/aos.j') }}s"></script>
    <script src="{{ asset('frontend/assets/js/frontend_submitter.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

    @stack('footer-styles')

    @stack('footer-scripts')

</body>
</html>
