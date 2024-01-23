@extends('layouts.app')

@section('titulo')
    Registrar Producto
@endsection

@section('contenido')
<div class="flex justify-end">
    <livewire:fecha-actual />
</div>
<x-enlace-button 
route="productos.index"
text="Regresar"
/>

<h2 class="text-3xl font-semibold mb-6 text-center">Crear Producto</h2>

<div class="max-w-lg mx-auto bg-cyan-600 py-10 p-4 shadow-md rounded-md">
    <form action="{{ route('productos.store') }}" method="post" novalidate>
        @csrf
        <div class="mb-4">
            <label for="nombre" class="mb-2 block uppercase text-white font-bold">Nombre del producto</label>
            <input 
                type="text" 
                name="nombre" 
                id="nombre" 
                class="mt-1 p-2 w-full border rounded-md @error('nombre') border-red-500 @enderror"
                placeholder="Eje: Mayonesa hellmann's 300 gr"
                value="{{old('nombre')}}">
                @error('nombre')
                <div class="my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                    <p class="text-red-700">{{ $message }}</p>
                </div>
                @enderror
        </div>
        <div class="mb-4">
            <label for="categoria" class="mb-2 block uppercase text-white font-bold">Categoria</label>
            <select name="categoria" id="categoria" class="mt-1 p-2 w-full border rounded-md @error('categoria') border-red-500 @enderror">
                <option 
                    selected 
                    disabled
                    >-- Seleccione Categoria --
                </option>
              @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}"> 
                    {{$categoria->categoria}}
                </option>
                @endforeach
            </select>
            @error('categoria')
            <div class="my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                <p class="text-red-700">{{ $message }}</p>
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="precio" class="mb-2 block uppercase text-white font-bold">Precio</label>
            <input 
                type="text" 
                name="precio" 
                id="precio" 
                class="mt-1 p-2 w-full border rounded-md @error('precio') border-red-500 @enderror"
                placeholder="Precio del producto"
                value="{{old('precio')}}">
                @error('precio')
                <div class="my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                    <p class="text-red-700">{{ $message }}</p>
                </div>
                @enderror
        </div>
        <div class="mb-4">
            <label for="cantidad" class="mb-2 block uppercase text-white font-bold">Cantidad</label>
            <input 
                type="number"
                min="0" 
                name="cantidad" 
                id="cantidad" 
                class="mt-1 p-2 w-full border rounded-md @error('cantidad') border-red-500 @enderror"
                placeholder="Cantidad de piezas"
                value="{{old('cantidad')}}">
                @error('cantidad')
                <div class="my-2 p-2  border-l-4 border-l-red-700 text-sm shadow-md text-center font-bold bg-red-100">
                    <p class="text-red-700">{{ $message }}</p>
                </div>
                @enderror
        </div>
        
        <div class="mb-4">
            <label for="precio" class="mb-2 block uppercase text-white font-bold">Descripción</label>
            <textarea 
                name="descripcion" 
                id="descripcion" 
                class="mt-1 p-2 border rounded-md  w-full @error('descripcion') border-red-500 @enderror"
                rows="5"
                >{{old('descripcion')}}</textarea>
                @error('descripcion')
                <p class="my-2 text-white font-bold uppercase p-2 rounded-lg text-center bg-red-500">{{$message}}</p>
                @enderror
        </div>
        
        <button 
            type="submit" 
            class="bg-amber-500 text-white p-2 rounded-md hover:bg-amber-600 w-full">
            Crear Producto
        </button>
    </form>
</div>    
@endsection