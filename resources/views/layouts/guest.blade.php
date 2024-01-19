<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Guiro | @yield('titulo')</title>

</head>

<body class="flex h-screen bg-slate-50">

    <main class="container w-4/5 mx-auto mt-10">
        <h2 class="text-4xl text-center font-extrabold mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>
    
</body>

</html>
