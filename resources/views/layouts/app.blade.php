<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.4/dist/tailwind.min.css" rel="stylesheet">
    <!-- Additional stylesheets, scripts, etc. can be added here -->
    @yield('styles')
</head>
<body class="antialiased bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </div>
    <!-- Additional scripts can be added here -->
    @yield('scripts')
</body>
</html>
