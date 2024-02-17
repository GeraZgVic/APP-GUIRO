@extends('layouts.app')

@section('titulo')
   Productos
@endsection

@section('contenido')
<div class="flex justify-end">
    <livewire:fecha-actual />
</div>

<div class="md:flex flex md:flex-row flex-col gap-2 mb-4">
    <x-enlace-button route="productos.create" text="Agregar producto" />
    <x-enlace-button route="categorias.index" text="Categorias" />
</div>
<h2 class="text-3xl font-light text-center font-mono">Productos</h2>
  {{-- Alertas --}}
  <x-alerta />
 
 <div class="flex flex-col mt-10">
    <div class="py-2 overflow-x-auto">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full border rounded overflow-hidden">
                <thead class="bg-cyan-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold uppercase">Categoria</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase">Nombre</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase">Descripción</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase">Precio</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase">Cantidad</th>
                        <th class="px-6 py-3 text-left font-semibold uppercase">Acciones</th>
                    </tr>
                </thead>
            
                <tbody id="listado-proveedores" class="bg-slate-50 hover:bg-slate-100">
                    @foreach ($productos as $producto)
                        <tr class="border-t hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $producto->categoria ? $producto->categoria->categoria : 'Sin Categoria' }}</td>
                            <td class="px-6 py-4">{{ $producto->nombre }}</td>
                            <td class="px-6 py-4">{{ $producto->descripcion }}</td>
                            <td class="px-6 py-4">${{ $producto->precio }}</td>
                            <td class="px-6 py-4">{{ $producto->cantidad }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <a href="{{ route('productos.edit', $producto) }}" class="bg-green-500 hover:bg-green-600 text-white p-1 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <form action="{{route('productos.destroy', $producto)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 hover:bg-red-600 text-white p-1 rounded" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $productos->links() }}
</div>

@endsection