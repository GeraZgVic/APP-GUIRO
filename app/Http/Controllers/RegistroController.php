<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de campos
       $this->validate($request, [
        'name' => 'required|max:30',
        'email' => 'required|unique:users|email|max:60',
        'password' => 'required|min:6'
       ]);

        //  Inserción de usuarios
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Autenticar usuario
        auth()->attempt($request->only('email', 'password'));
        

        // Redireccionar
        return redirect()->route('home');
    }
}
