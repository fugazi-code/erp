<?php

namespace App\Http\Livewire;

use Livewire\Component;

class KuysLayoutLivewire extends Component
{
    public function render()
    {
        return view('livewire.kuys-layout-livewire')->layout('layout.app-clean');
    }
}
