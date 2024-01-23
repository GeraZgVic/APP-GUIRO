@extends('layouts.guest')

@section('titulo')
    Crea una Cuenta
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5 mb-2">
    <img rel="preload" src="{{asset('img/logo.webp')}}" alt="Imagen registro usuarios">
    </div>
    <div class="md:w-4/12 p-6 rounded-lg shadow-xl border shadow-gray-700">
        <form action="{{route('registro')}}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Nombre
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="name"
                    placeholder="Tu Nombre"
                    class="bg-gray-200 border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{old('name')}}"
                />
                @error('name')
                <div class="my-2 p-3 rounded-lg shadow-md text-center font-bold" style="background: linear-gradient(50deg, #ff6262, #296686);">
                    <p class="text-white">{{ $message }}</p>
                </div>
                @enderror
            </div>
            
            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                    E-mail
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email"
                    placeholder="Ingresa tu email de Registro"
                    class="bg-gray-200  border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{old('email')}}"
                />
                @error('email')
                <div class="my-2 p-3 rounded-lg shadow-md text-center font-bold" style="background: linear-gradient(50deg, #ff6262, #296686);">
                    <p class="text-white">{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                    Password
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password"
                    placeholder="Password de Registro"
                    class="bg-gray-200 border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                />
                @error('password')
                <div class="my-2 p-3 rounded-lg shadow-md text-center font-bold" style="background: linear-gradient(50deg, #ff6262, #296686);">
                    <p class="text-white">{{ $message }}</p>
                </div>
            @enderror
            </div>
            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                    Repetir Password
                </label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation"
                    placeholder="Repite tu Password"
                    class="bg-gray-200 border p-3 w-full rounded-lg"
                />
            </div>
                <input
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-cyan-600 hover:bg-cyan-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
        </form>
        <div class="mt-2">
            <a href="{{route('login')}}" class="text-gray-600 hover:text-gray-800 text-sm font-semibold">¿Ya tienes cuenta? Inicia Sesión</a>
        </div>
    </div>
</div>
@endsection