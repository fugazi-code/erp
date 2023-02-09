<?php

namespace App\Http\Livewire\Table;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ProductsTable extends DataTableComponent
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
    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->sortable()->isHidden(),
            Column::make("Category", "category.name")
                ->sortable(),
            Column::make("Sub category", "subCategory.name")
                ->sortable(),
            Column::make("Brand", "brand.name")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable(),
            Column::make("Sku", "sku")
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
