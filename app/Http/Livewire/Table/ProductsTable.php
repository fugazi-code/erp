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
            Column::make("Id", "id")->sortable(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Category", "category.name")
                ->searchable()
                ->sortable(),
            Column::make("Sub category", "subCategory.name")
                ->searchable()
                ->sortable(),
            Column::make("Brand", "brand.name")
                ->searchable()
                ->sortable(),
            Column::make("Sku", "sku")
                ->searchable()
                ->sortable(),
            Column::make("Selling Price", "selling_price")
                ->sortable(),
            Column::make("Vendor Price", "vendor_price")
                ->sortable(),
            Column::make("Created by", "createdBy.name")
                ->sortable(),
        ];
    }
}
