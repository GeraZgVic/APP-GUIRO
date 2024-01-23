<!-- x-nav-link.blade.php -->
<div>
    @props(['route', 'text'])

    @php
        $isActive = request()->routeIs($route);
        $defaultClasses = 'flex items-center p-2 rounded-lg text-white group';
        $activeClass = $isActive ? 'bg-gray-700' : 'hover:bg-gray-700';

        $classes = $defaultClasses . ' ' . $activeClass;
    @endphp

    <a href="{{ route($route) }}" class="{{ $classes }}">
        {{ $slot }} <!-- Uso del contenido proporcionado en la vista que usa el componente -->
        <span class="flex-1 ms-3 text-wrap">{{ $text }}</span>
    </a>
</div>
