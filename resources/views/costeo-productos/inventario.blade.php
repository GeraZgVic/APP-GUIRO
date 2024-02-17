@extends('layouts.app')

@section('titulo')
    Inventario Costeo
@endsection

@section('contenido')
    <x-alerta />
    <x-enlace-button route="costeo.index" text="Regresar" />
    <div class="flex justify-end">
        <livewire:fecha-actual />
    </div>
    <h2 class="text-3xl font-light text-center font-mono">Inventario de Costeo</h2>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @foreach ($costeosPorFecha as $fecha => $costeos)
            <div class="bg-white p-4 rounded-md shadow-md">
                <a href="{{ route('productos.por.fecha', ['fecha' => str_replace('/', '-', $fecha)]) }}"
                    class="block text-center bg-cyan-500 p-2 rounded text-white hover:bg-cyan-600 transition">
                    <span class="text-lg font-semibold mb-2">{{ $fecha }}</span>
                </a>
                <div class="mt-2 flex justify-between">
                    <p class="text-gray-600">{{ count($costeos) }} {{ Str::plural('producto', count($costeos))}}</p>
                    <form action="{{ route('costeo.destroy', $fecha) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 hover:border-b font-light">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    
    @endsection
