<div class="main-content">
    <header class="dashboard-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h1>My Wishlist</h1>
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
                        <h5 class="card-title">My Wishlist Items</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 1">
                                    <div class="card-body">
                                        <h5 class="card-title">Artistic Canvas</h5>
                                        <p class="card-text">$59.99</p>
                                        <a href="#" class="btn btn-custom">Add to Cart</a>
                                        <a href="#" class="btn btn-outline-danger mt-2">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 2">
                                    <div class="card-body">
                                        <h5 class="card-title">Acrylic Paint Set</h5>
                                        <p class="card-text">$34.99</p>
                                        <a href="#" class="btn btn-custom">Add to Cart</a>
                                        <a href="#" class="btn btn-outline-danger mt-2">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 3">
                                    <div class="card-body">
                                        <h5 class="card-title">Easel</h5>
                                        <p class="card-text">$79.99</p>
                                        <a href="#" class="btn btn-custom">Add to Cart</a>
                                        <a href="#" class="btn btn-outline-danger mt-2">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>