    <div class="main-content">
        <header class="dashboard-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col">
                        <h1>Customer Management</h1>
                    </div>
                    <div class="col-auto">
                        <div class="user-menu dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                <img src="https://via.placeholder.com/40" alt="Admin" class="rounded-circle" />
                                <span>Admin User</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard.settings') }}">Settings</a>
                                <li>
                                    <hr class="dropdown-divider" />
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
                            <h5 class="card-title">Customer Filters</h5>
                            <form class="row g-3">
                                <div class="col-md-3">
                                    <label for="customerStatus" class="form-label">Customer Status</label>
                                    <select id="customerStatus" class="form-select">
                                        <option selected>All</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="customerRole" class="form-label">Customer Role</label>
                                    <select id="customerRole" class="form-select">
                                        <option selected>All</option>
                                        <option>Customer</option>
                                        <option>Admin</option>
                                        <option>Customer Support</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="searchCustomer" class="form-label">Search Customer</label>
                                    <input type="text" class="form-control" id="searchCustomer"
                                        placeholder="Name or Email" />
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="submit" class="btn btn-custom w-100">
                                        Apply Filters
                                    </button>
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
                            <h5 class="card-title">Customer List</h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Registration Date</th>
                                            <th>Orders</th>
                                            <th>Total Spent</th>
                                            <th>Status</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>john.doe@example.com</td>
                                            <td>2023-01-15</td>
                                            <td>5</td>
                                            <td>$250.00</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>Customer</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editCustomerModal">
                                                    Edit
                                                </button>
                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#viewOrdersModal">
                                                    View Orders
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jane Smith</td>
                                            <td>jane.smith@example.com</td>
                                            <td>2023-02-20</td>
                                            <td>3</td>
                                            <td>$150.00</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>Customer</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editCustomerModal">
                                                    Edit
                                                </button>
                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#viewOrdersModal">
                                                    View Orders
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bob Johnson</td>
                                            <td>bob.johnson@example.com</td>
                                            <td>2023-03-10</td>
                                            <td>1</td>
                                            <td>$75.00</td>
                                            <td>
                                                <span class="badge bg-warning">Inactive</span>
                                            </td>
                                            <td>Customer</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editCustomerModal">
                                                    Edit
                                                </button>
                                                <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#viewOrdersModal">
                                                    View Orders
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Customer list pagination">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Customer Modal -->
        <div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCustomerModalLabel">
                            Edit Customer
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="editCustomerName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="editCustomerName" value="John Doe" />
                            </div>
                            <div class="mb-3">
                                <label for="editCustomerEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="editCustomerEmail"
                                    value="john.doe@example.com" />
                            </div>
                            <div class="mb-3">
                                <label for="editCustomerStatus" class="form-label">Status</label>
                                <select class="form-select" id="editCustomerStatus">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editCustomerRole" class="form-label">Role</label>
                                <select class="form-select" id="editCustomerRole">
                                    <option value="customer" selected>Customer</option>
                                    <option value="admin">Admin</option>
                                    <option value="support">Customer Support</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Orders Modal -->
        <div class="modal fade" id="viewOrdersModal" tabindex="-1" aria-labelledby="viewOrdersModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewOrdersModalLabel">
                            Customer Orders
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1001</td>
                                    <td>2023-06-15</td>
                                    <td>$75.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>#1002</td>
                                    <td>2023-06-20</td>
                                    <td>$120.00</td>
                                    <td><span class="badge bg-warning">Processing</span></td>
                                </tr>
                                <tr>
                                    <td>#1003</td>
                                    <td>2023-06-25</td>
                                    <td>$55.00</td>
                                    <td><span class="badge bg-info">Shipped</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>