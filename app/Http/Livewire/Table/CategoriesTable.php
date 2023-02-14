<?php

namespace App\Http\Livewire\Table;

use App\Http\Livewire\Table\Abstract\DataTableComponentCustom;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CategoriesTable extends DataTableComponentCustom
{
    public function builder(): Builder
    {
        return Category::query()
            ->with([
                'createdBy:name',
            ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->sortable()->isHidden(),
            Column::make("Name", "name")
                ->searchable()
                ->sortable(),
            Column::make("Code", "code")
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
