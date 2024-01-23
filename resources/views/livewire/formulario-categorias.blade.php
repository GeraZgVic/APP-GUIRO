<div class="mt-3">
    <h2 class="text-center font-medium text-xl mb-2">Agrega una nueva Categoria</h2>

    <div class="max-w-lg mx-auto bg-gray-200 py-12 px-3 shadow-md rounded-md">
        <form wire:submit.prevent='crearCategoria'>
            <div class="mb-4">
                <label for="categoria" class="mb-2 block uppercase text-gray-500 font-bold">Nombre de la categoria</label>
                <input 
                    type="text" 
                    wire:model='categoria'
                    id="categoria" 
                    class="mt-1 p-2 w-full border rounded-md @error('nombre') border-red-500 @enderror"
                    placeholder="Eje: Mascotas"
                    value="{{old('nombre')}}">
                    @error('nombre')
                    <div class="my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                        <p class="text-red-700">{{ $message }}</p>
                    </div>
                    @enderror
            </div>

            <div class="flex justify-center">
                <button 
                type="submit" 
                class="bg-amber-500 text-white p-2 rounded-md hover:bg-amber-600 w-full  md:w-5/6">
                Agregar Categoria
            </button>
        </div>
        </form>
    </div>
</div>
