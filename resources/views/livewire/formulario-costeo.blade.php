<div class="border p-4 shadow-lg max-w-lg mx-auto mt-4">
    @if (session()->has('mensaje'))
        <div id="alerta" class="bg-teal-100 border-t-2 border-teal-500 rounded-b px-3 py-2 shadow-md text-teal-900 font-semibold text-center uppercase animate-slide-in m-2">
            {{ session('mensaje') }}
        </div>
    @endif

    <h2 class="text-3xl font-bold mt-3 mb-5 text-center font-mono">Formulario de Costeo</h2>

    <form wire:submit.prevent="submit" class="flex gap-x-2 mb-4">
        <input 
            type="text" 
            wire:model="search" 
            placeholder="Buscar productos..."
            class="p-2 border rounded w-full" 
            value="{{$search}}"
            wire:input.debounce.100ms="submit">
        <button 
            type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-600 hover:text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
              </svg>              
        </button>
    </form>

    @if ($productos->count() > 0)
        <ul class="bg-white shadow-md p-2 mt-2 rounded max-h-40 overflow-y-auto">
            @foreach ($productos as $producto)
                <li 
                class="cursor-pointer my-2 text-gray-800 hover:text-gray-500" 
                wire:click="seleccionarProducto('{{ $producto->id }}')">
                    {{ $producto->nombre }}
                </li>
            @endforeach
        </ul>
    @else
        <p class="mt-2 text-center">No se encontraron productos.</p>
    @endif

    <form 
        wire:submit.prevent="calcular" 
        class="space-y-4 mt-4 ">
        <div class="flex flex-col md:flex-row md:gap-x-6">
            <div class="w-full md:w-1/2 mb-2">
                <label 
                    for="precio_costo" 
                    class="block p-1 font-semibold">
                    Precio Costo
                </label>
                <input 
                    id="precio_costo" 
                    type="text" 
                    wire:model='precio_costo' 
                    placeholder="Del producto"
                    class="w-full p-2 border rounded @error('precio_costo') border-red-500 @enderror">
                    @error('precio_costo')
                    <div class="my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                        <p class="text-red-700">{{ $message }}</p>
                    </div>
                    @enderror
            </div>
            <div class="w-full md:w-1/2">
                <label 
                    for="porcentaje" 
                    class="block p-1 font-semibold">
                    Porcentaje
                </label>
                <input 
                    type="text" 
                    wire:model='porcentaje' 
                    id="porcentaje" 
                    placeholder="Para venta"
                    class="w-full p-2 border rounded @error('porcentaje') border-red-500 @enderror">
                    @error('porcentaje')
                    <div class="my-2 p-2 border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                        <p class="text-red-700">{{ $message }}</p>
                    </div>
                    @enderror
            </div>
        </div>
        <div class="text-center">
            <button 
                type="submit"
                wire:click="$dispatch('mostrarAlerta')"
                class="bg-amber-500 text-white p-2 rounded-md hover:bg-amber-600 w-full md:w-2/3">
                Costear
            </button>
           
        </div>
    </form>
</div>
<script>
   document.addEventListener('livewire:initialized', function () {
            Livewire.on('mostrarAlerta', function () {
                setTimeout(() => {
                    const alerta = document.querySelector('#alerta');
                        setTimeout(() => {
                            if(alerta) {
                                alerta.remove();
                                return;
                            }
                        },2000)
                }, 2000);
            });
        });
</script>