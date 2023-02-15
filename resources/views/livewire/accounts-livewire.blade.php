<div>
    @push('breadcrumb-main')
        Account List
    @endpush
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <button class="btn btn-primary" wire:click='$set("detail", [])' data-bs-toggle="modal" data-bs-target="#crudModal">Add new User</button>
                        <livewire:table.accounts-table />
                    </div>
                    <!-- Modal -->
                    <div wire:ignore.self class="modal fade" id="crudModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="crudModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="crudModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" wire:model='detail.name'>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" wire:model='detail.email'>
                                        </div>
                                        @if(!isset($detail['id']))
                                            <div class="col-md-12 mb-2">
                                                <label for="">Password</label>
                                                <input type="password" class="form-control" wire:model='detail.password'>
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label for="">Confirm Password</label>
                                                <input type="password" class="form-control" wire:model='detail.password_confirmation'>
                                            </div>
                                        @endif
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
