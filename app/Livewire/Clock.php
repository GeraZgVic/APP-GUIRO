<?php

namespace App\Livewire;

use Livewire\Component;

class Clock extends Component
{
    public $hora;
    public $fecha;

    public function mount()
    {
        $this->hora = now()->toTimeString();
        $this->fecha = now()->toFormattedDateString();
    }

    public function render()
    {
        return view('livewire.clock');
    }

    
}
