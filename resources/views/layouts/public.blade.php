<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'MONOCORP') - Architectural Digital Engineering</title>
    <meta name="description" content="@yield('meta_description', 'MONOCORP is an independent software and digital infrastructure agency dedicated to building high-velocity, resilient systems.')">

    <!-- Pure CSS Monochrome System -->
    <link rel="stylesheet" href="{{ asset('css/tokens.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
    @yield('styles')
</head>
<body>
    @include('partials.public-header')

    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.public-footer')

    <!-- Vanilla JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
