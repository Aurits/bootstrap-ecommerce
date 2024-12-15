<div class="main-content">
    <header class="dashboard-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h1>Order Tracking</h1>
                </div>
                <div class="col-auto">
                    <div class="user-menu dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="https://via.placeholder.com/40" alt="User" class="rounded-circle">
                            <span>John Doe</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="account-settings.html">Profile</a></li>
                            <li><a class="dropdown-item" href="account-settings.html">Settings</a></li>
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
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Track Your Order</h5>
                        <form>
                            <div class="mb-3">
                                <label for="orderNumber" class="form-label">Order Number</label>
                                <input type="text" class="form-control" id="orderNumber"
                                    placeholder="Enter your order number">
                            </div>
                            <button type="submit" class="btn btn-custom">Track Order</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recent Orders</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Order #1234
                                <a href="#" class="btn btn-sm btn-outline-primary">Track</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Order #1235
                                <a href="#" class="btn btn-sm btn-outline-primary">Track</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Order #1236
                                <a href="#" class="btn btn-sm btn-outline-primary">Track</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Status: #1234</h5>
                        <div class="order-timeline">
                            <div class="timeline-item active">
                                <div class="timeline-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6>Order Placed</h6>
                                    <p>Your order has been successfully placed.</p>
                                    <small>June 15, 2023 - 10:30 AM</small>
                                </div>
                            </div>
                            <div class="timeline-item active">
                                <div class="timeline-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6>Order Processed</h6>
                                    <p>Your order has been processed and is being prepared for shipment.</p>
                                    <small>June 16, 2023 - 2:45 PM</small>
                                </div>
                            </div>
                            <div class="timeline-item active">
                                <div class="timeline-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6>Order Shipped</h6>
                                    <p>Your order has been shipped. Tracking number: ABCD1234567890</p>
                                    <small>June 17, 2023 - 11:20 AM</small>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="bi bi-circle"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6>Out for Delivery</h6>
                                    <p>Your order is out for delivery.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="bi bi-circle"></i>
                                </div>
                                <div class="timeline-content">
                                    <h6>Delivered</h6>
                                    <p>Your order has been delivered.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>