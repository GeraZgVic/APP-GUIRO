<div class="mt-3 md:mt-0">
    @if (session('status'))
    <div class="flex items-center justify-center my-4">
        <div id="alerta" class="bg-teal-100 border-t-4 border-teal-500 rounded-b px-4 py-3 shadow-md text-teal-900 font-semibold text-center uppercase animate-slide-in m-2">
            {{ session('status') }}
        </div>
    </div>
@endif
</div>
