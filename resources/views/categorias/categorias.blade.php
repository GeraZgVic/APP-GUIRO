@extends('layouts.app')

@section('titulo')
    Categorias
@endsection

@section('contenido')
    <div class="flex justify-end mb-2">
        <livewire:fecha-actual />
    </div>
    <div class="md:grid grid-cols-2 gap-2">
        <div>
            <livewire:formulario-categorias />
        </div>
        <div>
            <livewire:lista-categoria />
        </div>
    </div>
@endsection
