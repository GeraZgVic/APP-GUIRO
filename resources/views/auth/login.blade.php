@extends('layouts.guest')

@section('titulo')
    Login
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5 mb-2">
    <img rel="preload" src="{{asset('img/logo.webp')}}" alt="Imagen registro usuarios">
    </div>
    <div class="md:w-4/12 p-6 rounded-lg shadow-xl border shadow-gray-700">
        <form action="{{route('login')}}" method="POST">
            @csrf
           
            @if(session('mensaje'))
                <div class="my-2 p-3 rounded-lg shadow-md text-center font-bold" style="background: linear-gradient(50deg, #ff6262, #296686);">
                    <p class="text-white">{{session('mensaje')}}</p>
                </div>  
            @endif
            
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
            
                <input
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-cyan-600 hover:bg-cyan-700 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
        </form>
    </div>
</div>
@endsection