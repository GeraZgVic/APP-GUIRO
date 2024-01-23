<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Proveedor $proveedorModel)
    {
        // Nota: Si no usas inyeccion de dependencias, puedes instanciar el modelo
        // $proveedorModel = new Proveedor();

        // Obtener proveedores
        $proveedores = $proveedorModel->orderBy('nombre', 'asc')->get();
        
        return view('proveedores.proveedores', [
            'proveedores' => $proveedores
        ]);

        // Nota: Se puede usar compact('proveedores) -> Key y value iguales
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.crear-proveedor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar campos
        $this->validate($request, [
            'nombre' => 'required|max:50',
            'email' => 'nullable|email|max:50',
            'telefono' => 'nullable|digits:10'
        ]);

        Proveedor::create([
            'nombre' => $request->nombre,
            'email'=> $request->email,
            'telefono' => $request->telefono
        ]);

         // Redireccionar
         return redirect()->route('proveedores.index')->with('status', 'Creado Correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.editar-proveedor', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validar campos accediendo al $request
         $request->validate([
            'nombre' => 'required|max:50',
            'email' => 'nullable|email|max:50',
            'telefono' => 'nullable|digits:10'
        ]);

        // Actualizar el modelo usando Eloquent
        $proveedor = Proveedor::find($id);

        $proveedor->update([
            'nombre' => $request->nombre,
            'email'=> $request->email,
            'telefono' => $request->telefono
        ]);

        return redirect()->route('proveedores.index')->with('status', 'Actualizado Correctamente.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return back()->with('status', 'Eliminado Correctamente');
    }
}
