<div class="main-content">
    <header class="dashboard-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h1>Manage Orders</h1>
                </div>
                <div class="col-auto">
                    <div class="user-menu dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="https://via.placeholder.com/40" alt="Admin" class="rounded-circle">
                            <span>Admin User</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard.settings') }}">Settings</a>
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
                        <h5 class="card-title">Order Filters</h5>
                        <form class="row g-3">
                            <div class="col-md-3">
                                <label for="orderStatus" class="form-label">Order Status</label>
                                <select id="orderStatus" class="form-select">
                                    <option selected>All</option>
                                    <option>Pending</option>
                                    <option>Processing</option>
                                    <option>Shipped</option>
                                    <option>Delivered</option>
                                    <option>Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="dateRange" class="form-label">Date Range</label>
                                <select id="dateRange" class="form-select">
                                    <option selected>All Time</option>
                                    <option>Today</option>
                                    <option>Last 7 Days</option>
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                    <option>Custom Range</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="searchOrder" class="form-label">Search Order</label>
                                <input type="text" class="form-control" id="searchOrder"
                                    placeholder="Order ID or Customer Name">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-custom w-100">Apply Filters</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order List</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#1001</td>
                                        <td>John Doe</td>
                                        <td>2023-06-15</td>
                                        <td>$125.99</td>
                                        <td><span class="badge bg-warning">Processing</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#orderDetailsModal">View</button>
                                            <button class="btn btn-sm btn-success">Update Status</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#1002</td>
                                        <td>Jane Smith</td>
                                        <td>2023-06-14</td>
                                        <td>$89.50</td>
                                        <td><span class="badge bg-success">Shipped</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#orderDetailsModal">View</button>
                                            <button class="btn btn-sm btn-success">Update Status</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#1003</td>
                                        <td>Bob Johnson</td>
                                        <td>2023-06-13</td>
                                        <td>$210.75</td>
                                        <td><span class="badge bg-info">Pending</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#orderDetailsModal">View</button>
                                            <button class="btn btn-sm btn-success">Update Status</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Order list pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>



                </div> <!-- End Card -->
            </div> <!-- End col-md-12 -->
        </div> <!-- End Row -->
    </div> <!-- End Container -->
    <!-- Order Details Modal -->
    <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderDetailsModalLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Order #1001</h6>
                    <p><strong>Customer:</strong> John Doe</p>
                    <p><strong>Date:</strong> 2023-06-15</p>
                    <p><strong>Status:</strong> <span class="badge bg-warning">Processing</span></p>
                    <h6>Items</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Artistic Canvas</td>
                                <td>2</td>
                                <td>$49.99</td>
                                <td>$99.98</td>
                            </tr>
                            <tr>
                                <td>Acrylic Paint Set</td>
                                <td>1</td>
                                <td>$24.99</td>
                                <td>$24.99</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Subtotal:</th>
                                <td>$124.97</td>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-end">Tax:</th>
                                <td>$1.02</td>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-end">Total:</th>
                                <td>$125.99</td>
                            </tr>
                        </tfoot>
                    </table>
                    <h6>Shipping Address</h6>
                    <p>
                        John Doe<br>
                        123 Main St<br>
                        Anytown, ST 12345<br>
                        United States
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update Order</button>
                </div>
            </div>
        </div>
    </div> <!-- End Modal -->
</div> <!-- End Main Content -->