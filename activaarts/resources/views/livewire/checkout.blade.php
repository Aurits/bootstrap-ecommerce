<div>
    <main class="container py-5 mt-5">
        <h1 class="text-center mb-4">Checkout</h1>
        <div class="minimalist-divider"></div>

        <div class="row">
            <div class="col-md-8">
                <form wire:submit.prevent="placeOrder">
                    <h3 class="mb-3">Shipping Information</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" wire:model="firstName" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" wire:model="lastName" class="form-control" required />
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" wire:model="address" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" wire:model="city" class="form-control" required />
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select wire:model="state" class="form-control" required>
                                <option value="">Choose...</option>
                                <option value="US">Uganda</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="GB">United Kingdom</option>
                                <option value="AU">Australia</option>
                                <option value="IN">India</option>
                                <option value="NG">Nigeria</option>
                                <option value="KE">Kenya</option>
                                <option value="ZA">South Africa</option>
                                <option value="DE">Germany</option>
                                <option value="FR">France</option>
                                <option value="IT">Italy</option>
                                <option value="ES">Spain</option>
                                <option value="MX">Mexico</option>
                                <option value="BR">Brazil</option>
                                <option value="AR">Argentina</option>
                                <option value="JP">Japan</option>
                                <option value="KR">South Korea</option>
                                <option value="CN">China</option>
                                <option value="RU">Russia</option>
                                <option value="PH">Philippines</option>
                                <option value="SG">Singapore</option>
                                <option value="TH">Thailand</option>
                                <option value="EG">Egypt</option>
                                <option value="NG">Nigeria</option>
                                <option value="NG">Nigeria</option>
                                <!-- Add more countries here -->
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" wire:model="zip" class="form-control" required />
                        </div>
                    </div>

                    <hr class="my-4" />

                    <h3 class="mb-3">Payment Information</h3>
                    <div class="row g-3">

                        <!-- <div class="col-md-6">
                            <label for="cardName" class="form-label">Name on Card</label>
                            <input type="text" wire:model="cardName" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label for="cardNumber" class="form-label">Card Number</label>
                            <input type="text" wire:model="cardNumber" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label for="expiration" class="form-label">Expiration</label>
                            <input type="text" wire:model="expiration" class="form-control" placeholder="MM/YY" />
                        </div>
                        <div class="col-md-2">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" wire:model="cvv" class="form-control" />
                        </div> -->

                        <div class="col-12 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="cashOnDelivery"
                                    id="cashOnDelivery" />
                                <label class="form-check-label" for="cashOnDelivery">
                                    Cash on Delivery
                                </label>
                            </div>
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
                            @foreach($cartItems as $item)
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0">{{ $item['name'] }}</h6>
                                    <small class="text-muted">Quantity: {{ $item['quantity'] }}</small>
                                </div>
                                <span
                                    class="text-muted">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                            </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <strong>${{ number_format($subtotal, 2) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Shipping</span>
                                <strong>${{ number_format($shipping, 2) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tax</span>
                                <strong>${{ number_format($tax, 2) }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (USD)</span>
                                <strong>${{ number_format($total, 2) }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>