<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Guiro | @yield('titulo')</title>

</head>

<body class="flex h-screen bg-slate-50">

    {{-- Side Bar --}}
    <x-side-bar />

    @yield('contenido')
    
</body>

</html>
