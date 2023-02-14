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
                ->sortable()
                ->isHidden(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Category", "category.name")
                ->searchable()
                ->sortable(),
            Column::make("Description", "description")
                ->searchable()
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
