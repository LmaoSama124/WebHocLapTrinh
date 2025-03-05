<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang Quản lý web học lập trình</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/login_admin/images/icons/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login_admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login_admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login_admin/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login_admin/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login_admin/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login_admin/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login_admin/css/main.css') }}">
</head>

<body>
    <div class="main-panel">
        @yield('content')
    </div>
</body>

</html>