<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            padding: 50px;
        }

        .pdf-header {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
        }

        tr td:first-child {
            width: 50%;
            padding-right: 20px;
        }

        tr td:last-child {
            width: 50%;
            padding-left: 20px;
        }

        label {
            width: 100%;
            margin-bottom: 5px;
            display: block;
        }
        .form-control {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    @yield('pdf.content')
</body>
</html>