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
                            </li>
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
                                <select id="orderStatus" class="form-select" wire:model="filters.status">
                                    <option value="All">All</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Shipped">Shipped</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="dateRange" class="form-label">Date Range</label>
                                <select id="dateRange" class="form-select" wire:model="filters.dateRange">
                                    <option value="All Time">All Time</option>
                                    <option value="Today">Today</option>
                                    <option value="Last 7 Days">Last 7 Days</option>
                                    <option value="This Month">This Month</option>
                                    <option value="Last Month">Last Month</option>
                                    <option value="Custom Range">Custom Range</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="searchOrder" class="form-label">Search Order</label>
                                <input type="text" class="form-control" id="searchOrder"
                                    placeholder="Order ID or Customer Name" wire:model.debounce.500ms="filters.search">
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
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                        <td>${{ number_format($order->total, 2) }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary"
                                                wire:click="toggleDetails({{ $order->id }})">
                                                {{ $order->isExpanded ? 'Hide' : 'View' }} Details
                                            </button>
                                        </td>
                                    </tr>
                                    @if ($order->isExpanded)
                                    <tr>
                                        <td colspan="5">
                                            <h6>Order Details</h6>
                                            <p><strong>Customer:</strong> {{ $order->first_name }}
                                                {{ $order->last_name }}
                                            </p>
                                            <p><strong>Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
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
                                                    @foreach ($order->cart_items as $item)
                                                    <tr>
                                                        <td>{{ $item['name'] }}</td>
                                                        <td>{{ $item['quantity'] }}</td>
                                                        <td>${{ number_format($item['price'], 2) }}</td>
                                                        <td>${{ number_format($item['quantity'] * $item['price'], 2) }}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <h6>Shipping Address</h6>
                                            <p>
                                                {{ $order->address }}<br>
                                                {{ $order->city }}, {{ $order->state }}<br>
                                                {{ $order->zip }}
                                            </p>
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No orders found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>