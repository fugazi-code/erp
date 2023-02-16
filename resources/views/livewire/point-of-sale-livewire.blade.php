<div>
    <div class="row mt-5">
        <div class="col-md-7">
            <div class="d-flex flex-column">
                <div>
                    <h3>Categories</h3>
                </div>
                <div>
                    <div wire:ignore class="owl-carousel owl-theme mt-3">
                        @foreach ($categories as $category)
                            <div class="item w-100">
                                <a href="#" class="btn btn-outline-secondary w-100 py-3"
                                    wire:click='getProducts({{ $category->id }})'>
                                    <h5>{{ $category->name }}</h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        @if ($products)
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-md-3 mb-2  px-1">
                                        <a href="#"
                                            class="bg-white shadow btn btn-outline-link w-100 py-3 d-flex flex-column"
                                            wire:click='addToCart({{ $product->id }})'>
                                            <h5>{{ $product->name }}</h5>
                                            <label class="text-muted">{{ $product->subCategory->name }}</label>
                                            <small class="mt-3">Price {{ $product->selling_price }}</small>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div>
                <h3>Orders</h3>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="d-flex align-items-start flex-column bd-highlight mb-3 h-100">
                        <div class="p-2 bd-highlight d-flex flex-column w-100">
                            <div class="mb-3 d-flex flex-row justify-content-between">
                                <div class="tag-box">
                                    <div class="dm-tag tag-secondary tag-transparented">
                                        Total Items: {{ $totalItems }}
                                    </div>
                                </div>
                                <button wire:click='clearOrders' type="button"
                                    class="btn btn-sm btn-outline-link text-danger p-0">Clear All</button>
                            </div>
                            <div class="overflow-auto w-100" style="height: 250px; width:100%">
                                @foreach ($cart as $id => $item)
                                    <div class="row w-100 mb-2">
                                        <div class="col-3 font-weight-bold">
                                            <div class="font-">
                                                {{ $item['details']['name'] }}
                                            </div>
                                            <div class="badge badge-round badge-success badge-lg">
                                                {{ $item['details']['sku'] }}
                                            </div>
                                        </div>
                                        <div class="col-3">x{{ $item['count'] }}</div>
                                        <div class="col-3">{{ $item['price'] }}</div>
                                        <div class="col-3 d-flex justify-content-center">
                                            <button wire:click='removeFromCart({{ $id }})'
                                                class="btn btn-default btn-squared color-danger btn-outline-danger border-0 py-2 px-auto">
                                                <i class="fas fa-trash-alt me-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-3 d-flex flex-row justify-content-between mt-2">
                                <label>
                                    Sub-Total
                                </label>
                                <label class="font-weight-bold">
                                    {{ $subTotal }}
                                </label>
                            </div>
                            <div class="mb-3 d-flex flex-row justify-content-between mt-2">
                                <label>
                                    Tax
                                </label>
                                <input type="number" class="form-control" wire:model='tax' style="width: 20%">
                            </div>
                            <div class="mb-3 d-flex flex-row justify-content-between mt-2">
                                <h4>
                                    Tax
                                </h4>
                                <h4 class="font-weight-bold">
                                    {{ $total }}
                                </h4>
                            </div>
                        </div>
                        <div class="mb-auto p-2 bd-highlight w-100">
                            <button class="btn btn-success btn-block" type="button">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('vendor/owl/dist/assets/owl.carousel.min.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('vendor/owl/dist/owl.carousel.min.js') }}"></script>
        <script>
            $('.owl-carousel').owlCarousel({
                margin: 10,
                nav: true,
                navText: [
                    '<button class="btn btn-sm btn-info mx-2 mt-3">Prev</button>',
                    '<button class="btn btn-sm btn-info mx-2 mt-3">Next</button>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        </script>
    @endpush
</div>
