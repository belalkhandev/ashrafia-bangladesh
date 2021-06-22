<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fully featured and complete ICO Dashboard template for ICO backend management.">
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="images/favicon.png"><!-- Site Title  -->
    <title>TokenWiz - ICO User Dashboard Admin Template</title><!-- Vendor Bundle CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle49f7.css?ver=104') }}"><!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="layoutstyle">
    
</head>

<body class="page-user">


    @yield('base.content')
        

    <!-- JavaScript (include all script here) -->
    <script src="{{ asset('assets/js/jquery.bundle49f7.js?ver=104') }}"></script>
    <script src="{{ asset('assets/js/submitter.js') }}"></script>
    <script src="{{ asset('assets/js/script49f7.js?ver=104') }}"></script>
    @stack('footer-scripts')
</body>

</html>