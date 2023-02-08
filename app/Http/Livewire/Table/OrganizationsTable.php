<?php

namespace App\Http\Livewire\Table;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class OrganizationsTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return Organization::query()->withCount(['users']);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
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
