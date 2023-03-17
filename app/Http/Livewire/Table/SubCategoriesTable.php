<?php

namespace App\Http\Livewire\Table;

use App\Http\Livewire\Table\Abstract\DataTableComponentCustom;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SubCategoriesTable extends DataTableComponentCustom
{
    public function builder(): Builder
    {
        return SubCategory::query()
            ->with([
                'category:name',
                'createdBy:name',
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Category", "category.name")
                ->searchable()
                ->sortable(),
        ];
    }
}
