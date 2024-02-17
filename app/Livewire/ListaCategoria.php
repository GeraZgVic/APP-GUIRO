<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\Attributes\On;

class ListaCategoria extends Component
{

    // #[On('eliminarCategoria')]
    public function elimninarCategoria(Categoria $categoria)
    {
       $categoria->delete();
    }

    // Editar categoria
    public function editarCategoria($categoriaId) 
    {
        $this->dispatch('editarCategoria', $categoriaId);
    }

    public function render(Categoria $categoriasModel)
    {
        $categorias = $categoriasModel->orderBy('categoria', 'asc')->get();

        return view('livewire.lista-categoria', compact('categorias'));
    }
}
