<div>
    <div class="row mt-1">
        <div class="col-md-12 mb-3">
            <a href="{{ route('kuys.layout') }}" type="button" class="btn btn-secondary">Back to Tables</a>
        </div>
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
                                            wire:click='addToCart({{ $product->id }}, {{ $product->selling_price }}, "{{ $product->name }}", "{{ $product->sku }}")'>
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
                                        Total Items: {{ count($cart) }}
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
                                                {{ $item['name'] }}
                                            </div>
                                            <div class="">
                                                Code: {{ $item['sku'] }}
                                            </div>
                                        </div>
                                        <div class="col-3">x{{ $item['qty'] }}</div>
                                        <div class="col-3">{{ $item['price'] }}/{{ $item['sub_total'] }}</div>
                                        <div class="col-3 d-flex justify-content-center">
                                            <div class="btn-group btn-group-sm" role="group"
                                                aria-label="Basic example">
                                                <button type="button" class="btn btn-primary"
                                                    wire:click='minusFromCart({{ $item['id'] }})'>
                                                    <i class="fas fa-minus me-1"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger"
                                                    wire:click='removeFromCart({{ $item['id'] }})'>
                                                    <i class="fas fa-trash-alt me-1"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <hr class="m-1">
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-1 d-flex flex-row justify-content-between mt-3">
                                <strong>
                                    Sub-Total
                                </strong>
                                <label class="font-weight-bold">
                                    {{ $subTotal }}
                                </label>
                            </div>
                            <div class="mb-1 d-flex flex-row justify-content-between">
                                <strong>
                                    Tax
                                </strong>
                                <input type="number" class="form-control" wire:model='tax' style="width: 20%">
                            </div>
                            <div class="mb-3 d-flex flex-row justify-content-between">
                                <h4>
                                    Total
                                </h4>
                                <h4 class="font-weight-bold">
                                    {{ $subTotal + (int) $tax }}
                                </h4>
                            </div>
                        </div>
                        <div class="mb-auto p-2 bd-highlight w-100 d-flex">
                            <button class="btn btn-success w-100 mx-1" type="button" data-bs-toggle="modal"
                            wire:click='checkoutResetInput'
                                data-bs-target="#checkOutModal">Cash</button>
                            <button class="btn btn-primary w-100 mx-1" type="button" data-bs-toggle="modal"
                                wire:click='checkoutResetInput'
                                data-bs-target="#stcpayModal">STC Pay</button>
                        </div>
                        <div class="mb-auto p-2 bd-highlight w-100">
                            <button class="btn btn-outline-secondary" type="button"
                                wire:click='voidOrder'>Void</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkOutModal -->
    <div wire:ignore.self class="modal fade" id="checkOutModal" tabindex="-1" aria-labelledby="checkOutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkOutModalLabel">Cash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label>Recipient</label>
                            <input type="text" class="form-control" wire:model='checkout.email'>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label>Received</label>
                            <input type="text" class="form-control" wire:model='checkout.received'>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Total Amount: {{ $subTotal + (float) $tax }}</label>
                        </div>
                        <div class="col-md-12">
                            @if ((float) ($checkout['received'] ?? 0) - ($subTotal + (float) $tax) >= 0)
                                <label>Change: {{ (float) ($checkout['received'] ?? 0) - ($subTotal + (float) $tax)  }}</label>
                            @else
                                <label>Change: Input valid Received Amount</label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click='generateQRCode'>Check-Out</button>
                </div>
            </div>
        </div>
    </div>

    <!-- stcpayModal -->
    <div wire:ignore.self class="modal fade" id="stcpayModal" tabindex="-1" aria-labelledby="stcpayModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stcpayModalLabel">STC Pay</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label>Recipient</label>
                            <input type="text" class="form-control" wire:model='checkout.email'>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label>Reference no.</label>
                            <input type="text" class="form-control" wire:model='checkout.stc_ref_no'>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label>Total Amount: {{ $subTotal + (float) $tax }}</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click='stcCheckOut'>Check-Out</button>
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
