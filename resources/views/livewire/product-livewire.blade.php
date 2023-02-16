<div>
    @push('breadcrumb-main')
        Product List
    @endpush
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:table.products-table/>
                </div>
            </div>
        </div>
    </div>
</div>
