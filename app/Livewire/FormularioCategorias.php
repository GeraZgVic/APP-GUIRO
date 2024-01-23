<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class FormularioCategorias extends Component
{
    // Sincronizar atributo name = wire:model
    public $categoria;

    // Definir Reglas
    protected $rules = [
      'categoria' => 'required'  
    ];

    public function crearCategoria() 
    {
        // Obtener array asociativo de reglas
        $datos = $this->validate();

        // Crear nueva categoria
        Categoria::create([
            'categoria' => $datos['categoria']
        ]);

        return redirect()->route('categorias.index')->with('status', 'Categoria Agregada Correctamente');

    }

    public function render()
    {
        return view('livewire.formulario-categorias');
    }
}
