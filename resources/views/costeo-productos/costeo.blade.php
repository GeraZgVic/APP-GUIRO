@extends('layouts.app')

@section('titulo')
    Costeo Producto
@endsection

@section('contenido')

<x-enlace-button route="costeo.inventario" text="Inventario de Costeo" />

    <div class="flex justify-end  mb-2">
        <livewire:fecha-actual />
    </div>
    <div class="md:flex">
        <div class="md:w-2/3">
            <livewire:formulario-costeo />
        </div>
        <div class="md:w-1/2">
            <livewire:datos-costeo />
        </div>
    </div>
    
@endsection