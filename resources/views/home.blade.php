@extends('layouts.app')

@section('titulo')
    Página principal
@endsection

@section('contenido')
        <div class="flex-auto w-4/5 p-4">
            <div class="container mx-auto">
                <h1 class="font-semibold text-2xl">Bienvenido (a) {{auth()->user()->name}}, ¿Qué deseas hacer?</h1>
             
                {{-- CARDS --}}
                <x-card />
            </div>
        </div>
@endsection