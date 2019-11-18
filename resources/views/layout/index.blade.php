<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Quản lý nhân khẩu</title>
        <base href="{{asset('')}}">
        <!-- Bootstrap Core CSS -->
        <link href="frontend/css/style.css" rel="stylesheet">
        <link href="frontend/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="frontend/css/sb-admin.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="frontend/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="frontend/css/my.css" rel="stylesheet">
    </head>
    <body>
        @include('layout.header')
        
        @yield('content')
        
        <!-- jQuery -->
        <script src="frontend/js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="frontend/js/bootstrap.min.js"></script>
        <script src="frontend/js/my.js"></script>
        @yield('scripts')
    </body>
</html>