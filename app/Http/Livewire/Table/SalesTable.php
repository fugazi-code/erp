<?php

namespace App\Http\Livewire\Table;

use App\Http\Livewire\Table\Abstract\DataTableComponentCustom;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Sale;

class SalesTable extends DataTableComponentCustom
{
    protected $model = Sale::class;

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Customer", "customer.name")
                ->sortable(),
            Column::make("Supplier", "supplier.name")
                ->sortable(),
            Column::make("Sale date", "sale_date")
                ->sortable(),
            Column::make("Order tax", "order_tax")
                ->sortable(),
            Column::make("Discount", "discount")
                ->sortable(),
            Column::make("Shipping", "shipping")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Payment", "payment")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
