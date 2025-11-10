<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    <div id="app">
        <!-- Navbar Section -->
        @hasSection('navbar')
            @yield('navbar')
        @else
            @include('partials.navbar')
        @endif

        <!-- Main Content Section -->
        <main class="main-content">
            @yield('content')
        </main>

        <!-- Footer Section (optional) -->
        @hasSection('footer')
            @yield('footer')
        @endif
    </div>

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
