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
    {{-- favicons --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/admin-favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/admin-favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/admin-favicons/favicon-16x16.png">
    <link rel="manifest" href="/admin-favicons/site.webmanifest">
    <link rel="mask-icon" href="/admin-favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/admin-favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-config" content="/admin-favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
</head>
<body class="hold-transition @yield('body_class')">
    
    @yield('body')
        <script src="{{ mix('js/admin.js') }}"></script>
        @yield('adminlte_js')
</body>
</html>
