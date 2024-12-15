<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activa Arts - User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dashboards/styles/custom.css">
    <link rel="stylesheet" href="dashboards/styles/dashboard.css">
    <link rel="stylesheet" href="{{ asset('admin/dashboards/styles/mobile.css') }}">
    @livewireStyles
</head>

<body>
    <div class="dashboard-container">
        <nav class="sidebar">
            <div class="sidebar-header">
                <h3>Activa Arts</h3>
            </div>
            <ul class="list-unstyled">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                </li>
                <li class="{{ request()->routeIs('user.dashboard.orders') ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard.orders') }}">
                        <i class="bi bi-box-seam"></i> My Orders
                    </a>
                </li>
                <li class="{{ request()->routeIs('user.dashboard.wishlist') ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard.wishlist') }}">
                        <i class="bi bi-heart"></i> Wishlist
                    </a>
                </li>
                <li class="{{ request()->routeIs('user.dashboard.settings') ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard.settings') }}">
                        <i class="bi bi-gear"></i> Account Settings
                    </a>
                </li>
                <li class="{{ request()->routeIs('user.dashboard.support') ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard.support') }}">
                        <i class="bi bi-question-circle"></i> Support
                    </a>
                </li>
                <li class="{{ request()->routeIs('user.dashboard.order-tracking') ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard.order-tracking') }}">
                        <i class="bi bi-truck"></i> Order Tracking
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