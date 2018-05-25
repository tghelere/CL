<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.head')         
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KRRFNLQ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="app" class="{{ (preg_match("/^servicos-[a-z\-]+$/", Route::currentRouteName()) ? 'servicos' : '') }} {{ (preg_match("/^solucoes-[a-z\-]+$/", Route::currentRouteName()) ? 'solucoes' : '') }} {{ Route::currentRouteName() }}">
        @include('partials.nav')
        
        <form-request-a-quote></form-request-a-quote>

        @yield('content')
        
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
