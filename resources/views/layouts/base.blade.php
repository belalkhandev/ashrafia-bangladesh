<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Anjuman e Asharfia Bangladesh">
    
    <!-- vendors -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">
    <!-- main styles-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @stack('header-scripts')
</head>

<body>


    @yield('base.content')


    <!-- JavaScript (include all script here) -->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/popper.min.j') }}s"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    {{--  Ajax Submitter  --}}
    <script src="{{ asset('assets/js/ajax-submitter.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('footer-scripts')
</body>

</html>
