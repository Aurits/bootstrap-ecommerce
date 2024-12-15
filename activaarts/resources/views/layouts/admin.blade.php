<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activa Arts - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dashboards/styles/custom.css">
    <link rel="stylesheet" href="dashboards/styles/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('admin/dashboards/styles/mobile.css') }}">
    @livewireStyles
</head>

<body>
    <div class="dashboard-container">

        <nav class="sidebar">
            <div class="sidebar-header">
                <h3>Activa Arts Admin</h3>
            </div>
            <ul class="list-unstyled">
                <li class="{{ request()->routeIs('admin.dashboard.home') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard.home') }}">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.dashboard.orders') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard.orders') }}">
                        <i class="bi bi-box-seam"></i> Manage Orders
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.dashboard.products') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard.products') }}">
                        <i class="bi bi-grid"></i> Manage Products
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.dashboard.customers') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard.customers') }}">
                        <i class="bi bi-people"></i> Customer Management
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.dashboard.reports') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard.reports') }}">
                        <i class="bi bi-graph-up"></i> Reports
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.dashboard.settings') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard.settings') }}">
                        <i class="bi bi-gear"></i> Settings
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        {{ $slot }}
        <button id="mobile-nav-toggle" class="mobile-nav-toggle d-lg-none">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <script src="{{ asset('admin/dashboards/mobile.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
    @stack('scripts')
</body>

</html>