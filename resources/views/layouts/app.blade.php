<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moj Blog</title>
    <link rel="stylesheet" href="{{ asset('template/templatemo/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/templatemo/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/templatemo/css/templatemo-style.css') }}">
</head>
<body>
    
    @include('layouts.header') 
    <main>
        @yield('content') 
    </main>
    @include('layouts.footer')
    
    <script src="{{ asset('template/templatemo/js/plugins.js') }}"></script>
</body>
</html>
