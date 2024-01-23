<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/functions.js'])
    @livewireStyles
    <title>Guiro | @yield('titulo')</title>
    @stack('scripts')


</head>

<body class="min-h-screen bg-gray-100">
    <div class="md:flex justify-end">

        {{-- Sidebar --}}
        <x-side-bar />

        <main class="md:w-3/5 xl:w-4/5 px-5 py-10">
            <div class="container mx-auto">
                @yield('contenido')
            </div>
        </main>

    </div>

    @livewireScripts
</body>


</html>
