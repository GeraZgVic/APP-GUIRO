@extends('layouts.app')

@section('titulo')
    Crear Proveedor
@endsection

@section('contenido')
    <div class="flex justify-end">
        <livewire:fecha-actual />
    </div>
    <x-enlace-button 
    route="proveedores.index"
    text="Regresar"
    />

    <h2 class="text-3xl font-semibold mb-6 text-center">Crear Proveedor</h2>

    <div class="max-w-lg mx-auto bg-cyan-600 py-20 p-32 shadow-md rounded-md">
        <form action="{{ route('proveedores.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="mb-2 block uppercase text-white font-bold">Empresa/Nombre</label>
                <input 
                    type="text" 
                    name="nombre" 
                    id="nombre" 
                    class="mt-1 p-2 w-full border rounded-md @error('nombre') border-red-500 @enderror"
                    placeholder="Eje: Bimbo - Victor"
                    value="{{old('nombre')}}">
                    @error('nombre')
                    <div class="my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                        <p class="text-red-700">{{ $message }}</p>
                    </div>
                    @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="mb-2 block uppercase text-white font-bold">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="mt-1 p-2 w-full border rounded-md @error('email') border-red-500 @enderror">
                    @error('email')
                    <div class="my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                        <p class="text-red-700">{{ $message }}</p>
                    </div>
                    @enderror
            </div>
            <div class="mb-6">
                <label for="telefono" class="mb-2 block uppercase text-white font-bold">Teléfono</label>
                <input 
                    type="tel" 
                    id="telefono" 
                    name="telefono" 
                    class="mt-1 p-2 w-full border rounded-md @error('telefono') border-red-500 @enderror">
                    @error('telefono')
                    <div class="my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                        <p class="text-red-700">{{ $message }}</p>
                    </div>
                    @enderror
            </div>

            <button 
                type="submit" 
                class="bg-amber-500 text-white p-2 rounded-md hover:bg-amber-600 w-full">
                Crear Proveedor
            </button>
        </form>
    </div>
@endsection
