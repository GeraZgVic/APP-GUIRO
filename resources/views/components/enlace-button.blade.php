<div class="md:mt-0 mt-3">
    @props(['route', 'text'])

    <a {{ $attributes->merge(['class' => 'bg-transparent hover:bg-cyan-600 text-cyan-800 font-semibold hover:text-white py-2 px-4 border border-cyan-600 hover:border-transparent rounded']) }}
        href="{{ route($route) }}">
        {{ $text }}
    </a>
</div>