@extends('layouts.app')

@section('titulo')
    Productos por Fecha
@endsection

@section('contenido')
<x-enlace-button route="costeo.inventario" text="Regresar" />
<div class="flex justify-end">
    <livewire:fecha-actual />
</div>


   <div>
    <h2 class="text-3xl font-mono font-semibold mb-2 text-center">Productos del {{ str_replace('_','-',$fecha) }}</h2>
        <div class="flex flex-col mt-10">
            <div class="py-2 overflow-x-auto">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full border rounded overflow-hidden">
                        <thead class="bg-cyan-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold uppercase">Nombre</th>
                                <th class="px-6 py-3 text-left font-semibold uppercase">Precio Costo</th>
                                <th class="px-6 py-3 text-left font-semibold uppercase">Precio Venta</th>
                                <th class="px-6 py-3 text-left font-semibold uppercase">Porcentaje</th>
                                <th class="px-6 py-3 text-left font-semibold uppercase">Margen</th>
                            </tr>
                        </thead>
                    
                        <tbody id="listado-proveedores" class="bg-slate-50 hover:bg-slate-100">
                            @foreach ($productosPorFecha as $costeo)
                                <tr class="border-t hover:bg-gray-100">
                                    <td class="px-6 py-4">{{ $costeo->producto->nombre }}</td>
                                    <td class="px-6 py-4">${{ $costeo->precio_costo }}</td>
                                    <td class="px-6 py-4">${{ $costeo->precio_venta }}</td>
                                    <td class="px-6 py-4">{{ $costeo->porcentaje }}%</td>
                                    <td class="px-6 py-4">{{ $costeo->margen }}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
</div>
@endsection