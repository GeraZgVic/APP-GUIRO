<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Producto $producto)
    {
        $productos = $producto->with('categoria')->orderBy('nombre', 'asc')->paginate(10);

        return view('productos.productos', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('categoria', 'asc')->get();

        return view('productos.crear-producto', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'categoria' => 'required',
            'nombre' => 'required|max:40',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric',
            'cantidad' => 'required'
        ]);

        Producto::create([
            'categoria_id' => $request->categoria,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad
        ]);

        return redirect()->route('productos.index')->with('status', 'Se agregó correctamente el producto');
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
    public function edit(Producto $producto)
    {

        $categorias = Categoria::orderBy('categoria', 'asc')->get();

        return view('productos.editar-producto', [
            'producto' => $producto,
            'categorias' => $categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categoria' => 'required',
            'nombre' => 'required|max:40',
            'descripcion' => 'nullable',
            'precio' => 'required|numeric',
            'cantidad' => 'required'
        ]);

        // Actualizar Producto
        $productos = Producto::find($id);

        $productos->update([
            'categoria_id' => $request->categoria,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad
        ]);

        return redirect()->route('productos.index')->with('status', 'Actualizado Correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        // Borrar Producto
        $producto->delete();

        return back()->with('status', 'Producto Eliminado Correctamente');
    }
}
