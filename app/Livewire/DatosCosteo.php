<?php

namespace App\Livewire;

use Livewire\Component;

class DatosCosteo extends Component
{
    protected $listeners = ['productoAgregado' => 'actualizarProductosCosteados'];

    // Almacenar Productos Costeados
    public $productosCosteados = [];

    public function actualizarProductosCosteados($producto) 
    {
        array_unshift($this->productosCosteados, $producto);
    }

    public function render()
    {
        return view('livewire.datos-costeo');
    }
}
