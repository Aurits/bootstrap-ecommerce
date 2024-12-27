    <div class="main-content">
        <header class="dashboard-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col">
                        <h1>Admin Dashboard</h1>
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
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text display-4">{{ $totalOrders }}</p>
                            <a href="{{ route('admin.dashboard.orders') }}" class="btn btn-custom btn-sm">View
                                Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Revenue</h5>
                            <p class="card-text display-4">${{ number_format($revenue, 2) }}</p>
                            <a href="{{ route('admin.dashboard.reports') }}" class="btn btn-custom btn-sm">View
                                Report</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pending Orders</h5>
                            <p class="card-text display-4">{{ $pendingOrders }}</p>
                            <a href="{{ route('admin.dashboard.orders') }}" class="btn btn-custom btn-sm">Process
                                Orders</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">New Customers</h5>
                            <p class="card-text display-4">{{ $newCustomers }}</p>
                            <a href="{{ route('admin.dashboard.customers') }}" class="btn btn-custom btn-sm">View
                                Customers</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sales Trend</h5>
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Customer Registrations</h5>
                            <canvas id="registrationsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Recent Orders</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($recentOrders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                        <td>${{ number_format($order->total, 2) }}</td>
                                        <td>{{ $order->cash_on_delivery ? 'Paid' : 'Pending' }}</td>
                                        <td>{{ $order->created_at->format('d M Y, H:i') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No recent orders</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
    <script>
        // Sales Chart
        var salesCtx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Sales',
                    data: [12, 19, 3, 5, 2, 3],
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Registrations Chart
        var registrationsCtx = document.getElementById('registrationsChart').getContext('2d');
        var registrationsChart = new Chart(registrationsCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'New Registrations',
                    data: [65, 59, 80, 81, 56, 55],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endpush