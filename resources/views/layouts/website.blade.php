<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.head')         
</head>
<body>
    <div id="app" class="{{ Route::currentRouteName() }}">
        @include('partials.nav')

        @yield('content')
        
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
