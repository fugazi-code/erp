<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;
use App\Enums\SalesStatusEnum;

class KuysLayoutLivewire extends Component
{
    public $tables;

    public function mount()
    {
        $this->tables = [
            'table-01' => 'bg-dark',
            'table-02' => 'bg-dark',
            'table-03' => 'bg-dark',
            'table-04' => 'bg-dark',
            'table-05' => 'bg-dark',
            'table-06' => 'bg-dark',
            'table-07' => 'bg-dark',
            'table-08' => 'bg-dark',
            'table-09' => 'bg-dark',
            'table-10' => 'bg-dark',
            'table-11' => 'bg-dark',
            'table-12' => 'bg-dark',
            'table-s1' => 'bg-dark',
            'table-s2' => 'bg-dark',
            'table-BONG' => 'bg-dark',
            'table-MAT' => 'bg-dark',
            'table-A' => 'bg-dark',
            'table-B' => 'bg-dark',
            'table-C' => 'bg-dark',
            'table-D' => 'bg-dark',
            'table-E' => 'bg-dark',
            'table-F' => 'bg-dark',
            'table-G' => 'bg-dark',
        ];
    }

    public function render()
    {
        $this->checking();

        return view('livewire.kuys-layout-livewire')->layout('layout.app-clean');
    }

    public function gotoPOS($table)
    {
        return redirect()->route('sales.pos', ['table' => 'table-' . $table]);
    }

    public function checking()
    {
        foreach ($this->tables as $key => $item) {
            // Check if there is inprogress table
            $sale = Sale::query()
                ->where('table', $key)
                ->where('status', SalesStatusEnum::INPROGRESS)
                ->first();
            if($sale) {
                $this->tables[$key] = 'bg-warning';
            }
        }
    }
}
