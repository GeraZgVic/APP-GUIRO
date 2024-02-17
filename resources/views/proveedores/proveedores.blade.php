@extends('layouts.app')

@section('titulo')
    Proveedores
@endsection


@section('contenido')
    <div class="flex justify-end">
        <livewire:fecha-actual />
    </div>

    <x-enlace-button route="proveedores.create" text="Agregar proveedor" />
    <h2 class="text-3xl font-light text-center mt-4 md:mt-0 font-mono">Proveedores</h2>
        {{-- Alertas --}}
        <x-alerta />

    <div class="flex flex-col mt-10">
        <div class="flex gap-3">
            <a target="_blank" href="{{ route('export.pdf') }}" class="flex items-center justify-center bg-rose-600 hover:bg-rose-700 text-white font-semibold py-2 px-4 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                </svg>
                <span>Exportar a PDF</span>
            </a>
            <a href="{{ route('export.excel') }}" class="flex items-center justify-center bg-teal-500 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15M9 12l3 3m0 0 3-3m-3 3V2.25" />
                </svg>
                <span>Exportar a Excel</span>
            </a>    
        </div>
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
                        @forelse ($proveedores as $proveedor)
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
                                            <button class="bg-red-500 hover:bg-red-600 text-white p-1 rounded" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 10.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <p class="text-center font-extralight mb-5 text-gray-800 text-xl">Ningún proveedor, agrega alguno.</p>
                        @endforelse
                    </tbody>
                </table>
                
            </div>
        </div>
        {{ $proveedores->links() }}
       
    </div>
@endsection
