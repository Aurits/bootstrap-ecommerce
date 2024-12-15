<div>
    <main class="container py-5 mt-5">
        <h1 class="text-center mb-4 fade-in">Your Cart</h1>

        <div class="row">
            <div class="col-lg-8 fade-in">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <img src="https://via.placeholder.com/150" alt="Artistic Canvas"
                                    class="img-fluid rounded" />
                            </div>
                            <div class="col-md-9">
                                <h5>Artistic Canvas</h5>
                                <p class="mb-2 text-accent fw-bold">$59.99</p>
                                <div class="d-flex align-items-center mb-2">
                                    <label for="quantity1" class="me-2">Quantity:</label>
                                    <input type="number" id="quantity1" class="form-control form-control-sm"
                                        style="width: 60px" value="1" min="1" />
                                </div>
                                <button class="btn btn-sm btn-outline-danger">Remove</button>
                            </div>
                        </div>
                        <hr />
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <img src="https://via.placeholder.com/150" alt="Acrylic Paint Set"
                                    class="img-fluid rounded" />
                            </div>
                            <div class="col-md-9">
                                <h5>Acrylic Paint Set</h5>
                                <p class="mb-2 text-accent fw-bold">$34.99</p>
                                <div class="d-flex align-items-center mb-2">
                                    <label for="quantity2" class="me-2">Quantity:</label>
                                    <input type="number" id="quantity2" class="form-control form-control-sm"
                                        style="width: 60px" value="1" min="1" />
                                </div>
                                <button class="btn btn-sm btn-outline-danger">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 fade-in">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Order Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>$94.98</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping</span>
                            <span>$5.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tax</span>
                            <span>$9.50</span>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between mb-4">
                            <strong>Total</strong>
                            <strong class="text-accent">$109.48</strong>
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