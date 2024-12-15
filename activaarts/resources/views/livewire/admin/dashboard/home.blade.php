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
                            <p class="card-text display-4">1,234</p>
                            <a href="{{ route('admin.dashboard.orders') }}" class="btn btn-custom btn-sm">View
                                Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Revenue</h5>
                            <p class="card-text display-4">$45,678</p>
                            <a href="{{ route('admin.dashboard.reports') }}" class="btn btn-custom btn-sm">View
                                Report</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pending Orders</h5>
                            <p class="card-text display-4">23</p>
                            <a href="{{ route('admin.dashboard.orders') }}" class="btn btn-custom btn-sm">Process
                                Orders</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">New Customers</h5>
                            <p class="card-text display-4">56</p>
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
                            <h5 class="card-title">Recent Activities</h5>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    New order received
                                    <span class="badge bg-primary rounded-pill">2 min ago</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Customer support request
                                    <span class="badge bg-primary rounded-pill">15 min ago</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    New product added
                                    <span class="badge bg-primary rounded-pill">1 hour ago</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Order #1234 shipped
                                    <span class="badge bg-primary rounded-pill">2 hours ago</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    New customer registered
                                    <span class="badge bg-primary rounded-pill">3 hours ago</span>
                                </li>
                            </ul>
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