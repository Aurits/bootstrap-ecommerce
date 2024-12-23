<div class="main-content">
    <header class="dashboard-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h1>Dashboard Home</h1>
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
                <h2>Welcome back, John!</h2>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recent Orders</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Order #1234
                                <span class="badge bg-primary rounded-pill">Shipped</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Order #1235
                                <span class="badge bg-warning rounded-pill">Processing</span>
                            </li>
                        </ul>
                        <a href="{{ route('user.dashboard.orders') }}" class="btn btn-custom mt-3">View All Orders</a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Wishlist</h5>
                        <p>You have 5 items in your wishlist.</p>
                        <a href="{{ route('user.dashboard.wishlist') }}" class="btn btn-custom">View
                            Wishlist</a>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <h3>Quick Links</h3>
                <div class="quick-links">
                    <a href="{{ route('user.dashboard.orders') }}" class="btn btn-custom">View Latest Order</a>
                    <!-- <a href="{{ route('user.dashboard.settings') }}" class="btn btn-custom">Edit Account Info</a> -->
                    <a href="{{ route('products') }}" class="btn btn-custom">Browse New Products</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Featured Products</h5>
                        <div class="row">
                            @forelse($featuredProducts as $product)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/150' }}"
                                        class="card-img-top" alt="{{ $product->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                                        <a href="#" class="btn btn-custom">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-md-12">
                                <p class="text-center">No featured products available at the moment.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>