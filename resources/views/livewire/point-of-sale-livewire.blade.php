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
                        <div wire:ignore class="d-flex">
                            @foreach ($products as $product)
                                <div class="item w-100">
                                    <a href="#" class="btn btn-outline-secondary w-100 py-3"
                                        wire:click='addOrder({{ $product->id }})'>
                                        <h5>{{ $product->name }}</h5>
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
            <div class="d-flex flex-column">
                <div>
                    <h3>Orders</h3>
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
