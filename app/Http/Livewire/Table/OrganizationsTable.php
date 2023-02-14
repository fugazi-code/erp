<?php

namespace App\Http\Livewire\Table;

use App\Http\Livewire\Table\Abstract\DataTableComponentCustom;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class OrganizationsTable extends DataTableComponentCustom
{
    public function builder(): Builder
    {
        return Organization::query()->withCount(['users']);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->label(fn ($value) => "<label class=' rounded-pill bg-primary px-1 text-white'>{$value->users_count}</label> " . $value->name)
                ->html()
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
