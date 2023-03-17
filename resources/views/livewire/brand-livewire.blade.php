<div>
    @push('breadcrumb-main')
        Brand List
    @endpush
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <button class="btn btn-primary" wire:click='$set("detail", [])' data-bs-toggle="modal"
                        data-bs-target="#crudModal">Add Item</button>
                    </div>
                    <livewire:table.brand-table />
                </div>
            </div>
        </div>
    </div>
    @include('livewire.partials.item-form-modal')
</div>
