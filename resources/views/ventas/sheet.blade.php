@extends('layouts.app')

@section('titulo')
    Hoja Diaria
@endsection


@section('contenido')
    <div class="flex justify-end">
        <livewire:fecha-actual />
    </div>

    <h2 class="font-semibold text-2xl">Hoja Diaria</h2>

    <div class="flex-auto w-4/5 p-4">
        <div class="container mx-auto">


        </div>
    </div>
@endsection
