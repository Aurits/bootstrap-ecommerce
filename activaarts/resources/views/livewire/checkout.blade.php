<div>
    <main class="container py-5 mt-5">
        <h1 class="text-center mb-4">Checkout</h1>
        <div class="minimalist-divider"></div>

        <div class="row">
            <div class="col-md-8">
                <form>
                    <h3 class="mb-3">Shipping Information</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" required />
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" required />
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" required />
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" required />
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select" id="state" required>
                                <option value="">Choose...</option>
                                <option>California</option>
                                <option>New York</option>
                                <!-- Add more states -->
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="zip" required />
                        </div>
                    </div>

                    <hr class="my-4" />

                    <h3 class="mb-3">Payment Information</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="cardName" class="form-label">Name on Card</label>
                            <input type="text" class="form-control" id="cardName" required />
                        </div>
                        <div class="col-md-6">
                            <label for="cardNumber" class="form-label">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber" required />
                        </div>
                        <div class="col-md-4">
                            <label for="expiration" class="form-label">Expiration</label>
                            <input type="text" class="form-control" id="expiration" placeholder="MM/YY" required />
                        </div>
                        <div class="col-md-2">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" required />
                        </div>
                    </div>

                    <hr class="my-4" />

                    <button class="btn btn-custom btn-lg w-100" type="submit">
                        Place Order
                    </button>
                </form>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0">Artistic Canvas</h6>
                                    <small class="text-muted">Quantity: 1</small>
                                </div>
                                <span class="text-muted">$59.99</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0">Acrylic Paint Set</h6>
                                    <small class="text-muted">Quantity: 1</small>
                                </div>
                                <span class="text-muted">$34.99</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <strong>$94.98</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Shipping</span>
                                <strong>$5.00</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tax</span>
                                <strong>$9.50</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (USD)</span>
                                <strong>$109.48</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>