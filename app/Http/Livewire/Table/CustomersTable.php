<?php

namespace App\Http\Livewire\Table;

use App\Http\Livewire\Table\Abstract\DataTableComponentCustom;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Customer;

class CustomersTable extends DataTableComponentCustom
{
    protected $model = Customer::class;

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("name", "name")
                ->sortable(),
            Column::make("Phone", "phone")
                ->sortable(),
            Column::make("E-mail", "email")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
