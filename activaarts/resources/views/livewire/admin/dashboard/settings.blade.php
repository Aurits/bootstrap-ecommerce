<div class="main-content">
    <header class="dashboard-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h1>Settings</h1>
                </div>
                <div class="col-auto">
                    <div class="user-menu dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="https://via.placeholder.com/40" alt="Admin" class="rounded-circle">
                            <span>Admin User</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="settings.html">Profile</a></li>
                            <li><a class="dropdown-item" href="settings.html">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">General Store Settings</h5>
                        <form>
                            <div class="mb-3">
                                <label for="storeName" class="form-label">Store Name</label>
                                <input type="text" class="form-control" id="storeName" value="Activa Arts">
                            </div>
                            <div class="mb-3">
                                <label for="storeDescription" class="form-label">Store Description</label>
                                <textarea class="form-control" id="storeDescription"
                                    rows="3">Discover unique artworks and craft supplies.</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="storeLogo" class="form-label">Store Logo</label>
                                <input type="file" class="form-control" id="storeLogo">
                            </div>
                            <div class="mb-3">
                                <label for="storeTheme" class="form-label">Store Theme</label>
                                <select class="form-select" id="storeTheme">
                                    <option selected>Default</option>
                                    <option>Light</option>
                                    <option>Dark</option>
                                    <option>Custom</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-custom">Save General Settings</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Shipping Methods</h5>
                        <form>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="freeShipping" checked>
                                <label class="form-check-label" for="freeShipping">Enable Free Shipping</label>
                            </div>
                            <div class="mb-3">
                                <label for="freeShippingThreshold" class="form-label">Free Shipping Threshold</label>
                                <input type="number" class="form-control" id="freeShippingThreshold" value="50">
                            </div>
                            <div class="mb-3">
                                <label for="flatRate" class="form-label">Flat Rate Shipping</label>
                                <input type="number" class="form-control" id="flatRate" value="5.99">
                            </div>
                            <button type="submit" class="btn btn-custom">Save Shipping Settings</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Payment Gateways</h5>
                        <form>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="paypalEnabled" checked>
                                <label class="form-check-label" for="paypalEnabled">Enable PayPal</label>
                            </div>
                            <div class="mb-3">
                                <label for="paypalEmail" class="form-label">PayPal Email</label>
                                <input type="email" class="form-control" id="paypalEmail"
                                    value="payments@activaarts.com">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="stripeEnabled" checked>
                                <label class="form-check-label" for="stripeEnabled">Enable Stripe</label>
                            </div>
                            <div class="mb-3">
                                <label for="stripeKey" class="form-label">Stripe API Key</label>
                                <input type="text" class="form-control" id="stripeKey" value="sk_test_...">
                            </div>
                            <button type="submit" class="btn btn-custom">Save Payment Settings</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tax Settings</h5>
                        <form>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="enableTax" checked>
                                <label class="form-check-label" for="enableTax">Enable Tax Calculations</label>
                            </div>
                            <div class="mb-3">
                                <label for="taxRate" class="form-label">Default Tax Rate (%)</label>
                                <input type="number" class="form-control" id="taxRate" value="7.5">
                            </div>
                            <div class="mb-3">
                                <label for="taxBasis" class="form-label">Tax Calculation Basis</label>
                                <select class="form-select" id="taxBasis">
                                    <option selected>Subtotal</option>
                                    <option>Subtotal + Shipping</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-custom">Save Tax Settings</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>