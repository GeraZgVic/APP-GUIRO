@extends('layouts.app')

@section('titulo')
    Página principal
@endsection

@section('contenido')
   
        <div class="container mx-auto">
            <div class="md:flex items-center justify-between">
                <h2 class="font-bold text-3xl md:text-4xl text-indigo-700 mb-2 md:mb-0">
                    ¡Hola, {{ auth()->user()->name }}! ¿Qué te gustaría hacer hoy?
                </h2>
                <livewire:fecha-actual />
            </div>
            {{-- CARDS --}}
            <x-card />
        </div>

@endsection
