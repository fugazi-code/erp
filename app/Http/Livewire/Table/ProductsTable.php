<?php

namespace App\Http\Livewire\Table;

use App\Http\Livewire\Table\Abstract\DataTableComponentCustom;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProductsTable extends DataTableComponentCustom
{
    public function builder(): Builder
    {
        return Product::query()
            ->with([
                'category:name',
                'subCategory:name',
                'brand:name',
                'createdBy:name'
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->sortable()->isHidden(),
            Column::make("Category", "category.name")
                ->searchable()
                ->sortable(),
            Column::make("Sub category", "subCategory.name")
                ->searchable()
                ->sortable(),
            Column::make("Brand", "brand.name")
                ->searchable()
                ->sortable(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Sku", "sku")
                ->searchable()
                ->sortable(),
            Column::make("Price", "price")
                ->sortable(),
            Column::make("Unit", "unit")
                ->sortable(),
            Column::make("Qty", "qty")
                ->sortable(),
            Column::make("Created by", "createdBy.name")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
