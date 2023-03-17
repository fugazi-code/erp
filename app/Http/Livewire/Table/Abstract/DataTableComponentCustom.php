<?php
namespace App\Http\Livewire\Table\Abstract;

use Rappasoft\LaravelLivewireTables\DataTableComponent;

abstract class DataTableComponentCustom extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setTableAttributes([
            'default' => true,
            'class' =>  'table table-hover',
        ]);
        $this->setTrAttributes(function ($row, $index) {
            return [
                'class' => 'bg-gray-200',
                'wire:click' => "bind({$row->id})"
            ];
        });
    }

    public function bind($id)
    {
        $this->emit('bind', $id);
    }
}
