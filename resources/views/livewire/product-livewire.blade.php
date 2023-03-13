<div>
    @push('breadcrumb-main')
        Product List
    @endpush
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <button class="btn btn-primary" wire:click='$set("detail", [])' data-bs-toggle="modal" data-bs-target="#crudModal">Add new Product</button>
                        <livewire:table.products-table/>
                    </div>
                    <!-- Modal -->
                    <div wire:ignore.self class="modal fade" id="crudModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="crudModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="crudModalLabel">Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="">Category</label>
                                            <input type="text" class="form-control" wire:model='detail.category'>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Sub Category</label>
                                            <input type="email" class="form-control" wire:model='detail.sub-category'>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Brand</label>
                                            <input type="email" class="form-control" wire:model='detail.brand'>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Name</label>
                                            <input type="email" class="form-control" wire:model='detail.Name'>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">SKU</label>
                                            <input type="email" class="form-control" wire:model='detail.sku'>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Selling Price</label>
                                            <input type="email" class="form-control" wire:model='detail.selling-price'>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Vendor Price</label>
                                            <input type="email" class="form-control" wire:model='detail.vendor-price'>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Unit</label>
                                            <input type="email" class="form-control" wire:model='detail.unit'>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Qty</label>
                                            <input type="email" class="form-control" wire:model='detail.qty'>
                                        </div>
                                        @include('partials.error-message')
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    @if(!isset($detail['id']))
                                        <button type="button" class="btn btn-primary" wire:click='store'>Save</button>
                                    @else
                                        <button type="button" class="btn btn-primary" wire:click='update'>Update</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
