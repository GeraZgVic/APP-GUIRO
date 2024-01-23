@extends('layouts.app')

@section('titulo')
    Proveedores
@endsection


@section('contenido')
    <div class="flex justify-end">
        <livewire:fecha-actual />
    </div>

    <x-enlace-button route="proveedores.create" text="Agregar proveedor" />
    <h2 class="text-3xl font-light text-center">Proveedores</h2>

        @if (session('status'))
        <div class="flex items-center justify-center my-4">
            <div id="alerta" class="bg-green-500 p-2 text-white font-semibold rounded text-center uppercase">
                {{ session('status') }}
            </div>
        </div>
         @endif

    <div class="flex flex-col mt-10">
        <div class="py-2 overflow-x-auto">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full border rounded overflow-hidden">
                    <thead class="bg-cyan-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold uppercase">Nombre</th>
                            <th class="px-6 py-3 text-left font-semibold uppercase">Email</th>
                            <th class="px-6 py-3 text-left font-semibold uppercase">Teléfono</th>
                            <th class="px-6 py-3 text-left font-semibold uppercase">Acciones</th>
                        </tr>
                    </thead>
                
                    <tbody id="listado-proveedores" class="bg-slate-50 hover:bg-slate-100">
                        @foreach ($proveedores as $proveedor)
                            <tr class="border-t hover:bg-gray-100">
                                <td class="px-6 py-4">{{ $proveedor->nombre }}</td>
                                <td class="px-6 py-4">{{ $proveedor->email }}</td>
                                <td class="px-6 py-4">{{ $proveedor->telefono }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <a href="{{ route('proveedores.edit', $proveedor) }}" class="bg-green-500 hover:bg-green-600 text-white p-1 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{ route('proveedores.destroy', $proveedor) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-500 hover:bg-red-600 text-white text-white p-1 rounded" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 10.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
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
    </div>
@endsection
