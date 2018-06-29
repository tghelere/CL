<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title> @yield('title_prefix', config('adminlte.title_prefix', ''))
            @yield('title', config('adminlte.title', 'AdminLTE 2'))
            @yield('title_postfix', config('adminlte.title_postfix', ''))</title>

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    
    @yield('adminlte_css')
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
    <link href="{{ mix('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/offcanvas.css') }}">
</head>
<body class="hold-transition @yield('body_class')">
    
    @yield('body')
        <script src="{{ mix('js/admin.js') }}"></script>
        @yield('adminlte_js')
</body>
</html>
