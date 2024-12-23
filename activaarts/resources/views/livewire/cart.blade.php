<div>
    <main class="container py-5 mt-5">
        <h1 class="text-center mb-4 fade-in">Your Cart</h1>

        <div class="row">
            <div class="col-lg-8 fade-in">
                @if($cartItems->isEmpty())
                <div class="alert alert-info text-center">
                    Your cart is empty.
                </div>
                @else
                @foreach($cartItems as $item)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}"
                                    class="img-fluid rounded" />
                            </div>
                            <div class="col-md-9">
                                <h5>{{ $item['name'] }}</h5>
                                <p class="mb-2 text-accent fw-bold">${{ number_format($item['price'], 2) }}</p>
                                <div class="d-flex align-items-center mb-2">
                                    <label for="quantity{{ $loop->index }}" class="me-2">Quantity:</label>
                                    <input type="number" id="quantity{{ $loop->index }}"
                                        class="form-control form-control-sm" style="width: 60px"
                                        value="{{ $item['quantity'] }}" min="1"
                                        wire:change="updateQuantity({{ $item['id'] }}, $event.target.value)" />
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click="removeItem({{ $item['id'] }})">
                                        Remove
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col-lg-4 fade-in">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Order Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>${{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping</span>
                            <span>${{ number_format($shipping, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tax</span>
                            <span>${{ number_format($tax, 2) }}</span>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between mb-4">
                            <strong>Total</strong>
                            <strong class="text-accent">${{ number_format($total, 2) }}</strong>
                        </div>
                        <a href="{{ route('checkout') }}" class="btn btn-custom w-100">
                            <span>Proceed to Checkout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>