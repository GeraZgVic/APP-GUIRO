<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\CosteoProducto;

class FormularioCosteo extends Component
{
    // PARA ALERTA
    public $mensaje;
    // BUSCADOR - PRIMER FORM
    public $search = '';
    public $productos;
    public $producto_id;

    // SEGUNDO FORM
    public $precio_costo;
    public $porcentaje;

    public $resultado = 0;


    // Definir reglas de validación
    protected $rules = [
        'producto_id' => 'required',
        'precio_costo' => 'required|numeric',
        'porcentaje' => 'required|numeric'
    ];

    public function render()
    {
        $this->productos = Producto::where('nombre', 'like', '%' . $this->search . '%')->get();
        return view('livewire.formulario-costeo');
    }

    public function submit()
    {
        $this->productos = Producto::where('nombre', 'like', '%' . $this->search . '%')->get();
    }

    public function seleccionarProducto($productoId)
    {
        $producto = Producto::find($productoId);
        if($producto) {
            $this->producto_id = $productoId;
            $this->search = $producto->nombre;
        }
    }
    
    // public function limpiarBusqueda()
    // {
    //     if(empty($this->search)) {
    //         $this->search = '';
    //     }
    // }
    
    // (precio de venta - precio costo) / (precio de venta) * 100 = MARGEN
    public function calcular() {
        // Calculando porcentaje para precio venta
        $porcentajePrecioVenta = $this->porcentaje / 100;
        // Acceder a reglas de validación
        $datos = $this->validate();
        $precioCosto = $datos['precio_costo'];
        // Calcular el precio venta
        $precioVenta =  $precioCosto + ($porcentajePrecioVenta * $precioCosto);

        // Calcular Margen
        $this->resultado = (($precioVenta - $precioCosto) / $precioVenta) * 100;
        $margen = $this->resultado;
       
        // // Crear producto
        CosteoProducto::create([
            'producto_id' => $this->producto_id,
            'precio_costo' => $precioCosto,
            'precio_venta' => $precioVenta,
            'porcentaje' => $datos['porcentaje'],
            'margen' =>  $margen
        ]);

        // Pasar los datos al componente DatosCosteo
        $this->dispatch('productoAgregado', [
            'nombre' => $this->search,
            'precio_costo' => $precioCosto,
            'porcentaje' => $datos['porcentaje'],
            'precio_venta' => $precioVenta,
            'margen' => number_format($margen,2)
        ]);

        // Resetear formulario
        $this->reset();

        session()->flash('mensaje', 'Producto costeado con exito');
        $this->dispatch('mostrarAlerta');
    }

}
