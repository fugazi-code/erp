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
                                    <div class="col-md-3 mb-2">
                                        <a href="#"
                                            class="btn btn-outline-secondary w-100 py-3 d-flex flex-column"
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
            <div class="d-flex align-items-start flex-column bd-highlight mb-3 h-100">
                <div class="p-2 bd-highlight d-flex flex-column w-100">
                    <div>
                        <h3>Orders</h3>
                    </div>
                    <div class="mb-3 d-flex flex-row justify-content-between">
                        <small>Total Items: {{ $totalItems }}</small>
                        <button wire:click='clearOrders' type="button"
                            class="btn btn-sm btn-outline-link text-danger p-0">Clear All</button>
                    </div>
                    @foreach ($cart as $id => $item)
                        <div class="d-flex flex-row justify-content-between">
                            <div>{{ $item['details']['name'] }}</div>
                            <div>x{{ $item['count'] }} {{ $item['details']['selling_price'] }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="mb-auto p-2 bd-highlight w-100">
                    <button class="btn btn-success btn-block" type="button">Checkout</button>
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
