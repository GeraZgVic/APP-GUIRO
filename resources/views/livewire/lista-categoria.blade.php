<div class="mt-3 overflow-y-auto h-screen">
    <h2 class="text-center font-medium text-xl mb-2 font-mono">Categorias Actuales</h2>
        <ul class="bg-gray-200 rounded-md shadow-md">
            @forelse($categorias as $categoria)
                <li class="font-extralight flex gap-2 items-center justify-center hover:bg-gray-300 border-b border-b-slate-100">
                    {{ $categoria->categoria }}
                    {{-- Eliminar --}}
                    <button class="bg-red-500 rounded-full" type="submit"
                        wire:click="$dispatch('mostrarAlerta', {{ $categoria->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4 flex-shrink-0 transition duration-75 text-white hover:text-gray-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                    {{-- EDITAR --}}
                    <button
                        wire:click="editarCategoria({{$categoria->id}})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                        class="w-4 h-4 flex-shrink-0 transition duration-75 text-gray-800 hover:text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                          </svg>                          
                    </button>
                </li>
            @empty
                <p class="text-center p-2 text-cyan-900 font-semibold">Actualmente No hay Categorias</p>
            @endforelse
        </ul>
</div>

@prepend('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Lógica para Eliminar usando SweetAlert y Livewire 
        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', (categoriaId) => {
                Swal.fire({
                    title: '¿Eliminar Categoria?',
                    text: "Una Categoria eliminada no se puede recuperar:(",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('elimninarCategoria', categoriaId);
                        Swal.fire(
                            'Se eliminó la Categoria',
                            'Eliminado correctamente',
                            'success'
                        )
                    }
                })

            });
        });
    </script>
@endpush
