<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CosteoProducto;

class CosteoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('costeo-productos.costeo');
    }

    // PARA VISTA DE INVENTARIO
    public function indexInventario() {
        $costeosPorFecha = CosteoProducto::orderByDesc('created_at')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d/m/Y');
            });

        return view('costeo-productos.inventario', compact('costeosPorFecha'));
    }

    /**
     * Display the specified resource.
     */
    public function show($fecha)
    {
        $fechaFormateada = Carbon::createFromFormat('d-m-Y', str_replace('_', '-', $fecha))->format('Y-m-d');
        $productosPorFecha = CosteoProducto::whereDate('created_at', $fechaFormateada)->get();

        return view('costeo-productos.productosFecha', compact('fecha', 'productosPorFecha'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($fecha)
    {
        // Convertir cadena de fecha a un objeto DateTime y FORMATEAR FECHA DE d-m-Y a Y-m-d
        $fechaFormateada = DateTime::createFromFormat('d-m-Y', $fecha)->format('Y-m-d');

        // BUSCAR PRODUCTOS COSTEADOS PARA ELIMINAR whereDate - busca solo la fecha ignorando la hora.
        $costeos = CosteoProducto::whereDate('created_at', $fechaFormateada)->get();
        // Iterar productos a eliminar
        foreach ($costeos as $costeo) {
            $costeo->delete();
        }

        return back()->with('status', 'Productos Costeados Eliminados');
    }
}
