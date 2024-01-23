<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class FechaActual extends Component
{

    public $fechaActual;
    
    public function mount() {
        $this->fechaActual = Carbon::now('America/Mexico_City');
    }
    
    public function render()
    {
        return view('livewire.fecha-actual');
    }
}
