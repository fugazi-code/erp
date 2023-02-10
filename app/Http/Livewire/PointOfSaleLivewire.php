<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PointOfSaleLivewire extends Component
{
    public function render()
    {
        return view('livewire.point-of-sale-livewire')->layout('layout.app-clean');
    }
}
