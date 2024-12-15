<div class="main-content">
    <header class="dashboard-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h1>My Orders</h1>
                </div>
                <div class="col-auto">
                    <div class="user-menu dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="https://via.placeholder.com/40" alt="User" class="rounded-circle">
                            <span>John Doe</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.dashboard.settings') }}">Settings</a></li>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order History</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1234</td>
                                    <td>2023-06-15</td>
                                    <td>$99.99</td>
                                    <td><span class="badge bg-success">Delivered</span></td>
                                    <td><a href="#" class="btn btn-sm btn-custom">View Details</a></td>
                                </tr>
                                <tr>
                                    <td>#1235</td>
                                    <td>2023-06-10</td>
                                    <td>$149.99</td>
                                    <td><span class="badge bg-warning">Processing</span></td>
                                    <td><a href="#" class="btn btn-sm btn-custom">View Details</a></td>
                                </tr>
                                <tr>
                                    <td>#1236</td>
                                    <td>2023-06-05</td>
                                    <td>$79.99</td>
                                    <td><span class="badge bg-info">Shipped</span></td>
                                    <td><a href="#" class="btn btn-sm btn-custom">View Details</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Need Help?</h3>
                <p>If you have any questions about your orders, please visit our <a href="support.html">Support Page</a>
                    or contact our customer service team.</p>
            </div>
        </div>
    </div>
</div>