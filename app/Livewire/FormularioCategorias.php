<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class FormularioCategorias extends Component
{
     // Sincronizar atributo nombre = wire:model
     public $categoria;

     // Atributo para identificar la categoría que se está editando
     public $categoriaId;
 
     // Evento escuchado desde lista-categoria
     protected $listeners = ['editarCategoria'];
 
     // Definir Reglas
     protected $rules = [
         'categoria' => 'required',
     ];
 
     public function editarCategoria($categoriaId)
     {
         // Buscar la categoría por el ID y cargar la información en el formulario
         $categoria = Categoria::find($categoriaId);
 
         if ($categoria) {
             $this->categoriaId = $categoria->id;
             $this->categoria = $categoria->categoria;
         }
     }
 
     public function guardarCategoria()
     {
         // Validar los datos del formulario
         $datos = $this->validate();
 
         // Si existe una categoríaId, entonces es una edición
         if ($this->categoriaId) {
             $categoria = Categoria::find($this->categoriaId);
             $categoria->update([
                 'categoria' => $datos['categoria'],
             ]);
         } else {
             // Si no hay una categoríaId, entonces es una creación
             Categoria::create([
                 'categoria' => $datos['categoria'],
             ]);
         }
 
         // Limpiar los datos después de guardar
         $this->reset(['categoriaId', 'categoria']);
 
         // Redirigir o realizar otras acciones necesarias
         return redirect()->route('categorias.index')->with('status', 'Categoría guardada correctamente');
     }
 
     public function render()
     {
         return view('livewire.formulario-categorias');
     }
}
