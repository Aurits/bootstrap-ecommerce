<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="{{ asset('styles/custom.css') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <span class="brand-text">Activa</span>
                        <span class="brand-accent">Arts</span>
                    </a>
                    <i class="bi bi-list d-block d-lg-none" data-bs-toggle="collapse" data-bs-target="#navbarNav"></i>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link hover-effect" href="{{ route('home') }}">
                                    <i class="bi bi-house-door"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hover-effect" href="{{ route('products') }}">
                                    <i class="bi bi-grid"></i>
                                    <span>Products</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hover-effect" href="{{ route('about') }}">
                                    <i class="bi bi-info-circle"></i>
                                    <span>About</span>
                                </a>
                            </li>
                            <li class="nav-item position-relative">
                                <a class="nav-link hover-effect" href="{{ route('cart') }}">
                                    <i class="bi bi-cart"></i>
                                    <span>Cart</span>
                                    @php
                                    $totalQuantity = 0;
                                    $cartItems = session()->get('cart', []);
                                    foreach ($cartItems as $item) {
                                    $totalQuantity += $item['quantity']; // Add quantity of each item
                                    }
                                    @endphp
                                    @if($totalQuantity > 0)
                                    <span
                                        class="badge bg-danger rounded-pill position-absolute top-5 start-95 translate-middle p-1">
                                        {{ $totalQuantity }}
                                    </span>
                                    @endif
                                </a>
                            </li>

                            <!-- Conditional Rendering -->
                            @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle hover-effect" href="#" id="userDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i>
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link hover-effect" href="{{ route('login') }}">
                                    <i class="bi bi-person"></i>
                                    <span>Login</span>
                                </a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>

        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <footer class="footer-section py-4 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="footer-brand mb-4">
                        <h5>Activa<span class="text-accent">Arts</span></h5>
                    </div>
                    <p class="footer-description">Discover unique artworks and craft supplies that inspire creativity
                        and bring art into everyday life.</p>
                    <div class="newsletter-form mt-4">
                        <h6>Stay Updated</h6>
                        <form class="d-flex gap-2">
                            <input type="email" class="form-control" placeholder="Your email">
                            <button type="submit" class="btn btn-custom">Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('products') }}">Products</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('about') }}#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-title">Categories</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#">Paintings</a></li>
                        <li><a href="#">Sculptures</a></li>
                        <li><a href="#">Digital Art</a></li>
                        <li><a href="#">Craft Supplies</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h5 class="footer-title">Connect With Us</h5>
                    <div class="social-links">
                        <a href="#" class="social-link">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="bi bi-pinterest"></i>
                        </a>
                    </div>
                    <div class="contact-info mt-4">
                        <p><i class="bi bi-geo-alt"></i>Kampala (Uganda)</p>
                        <p><i class="bi bi-envelope"></i>activaartsug@gmail.com</p>
                        <p><i class="bi bi-telephone"></i>(+256) 773 559 912</p>
                    </div>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="footer-bottom text-center">
                <p class="mb-0">&copy; 2024 Activa Arts. All rights reserved.</p>
            </div>
        </div>
    </footer>



    <!-- Toast Notification -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">Item added to cart successfully!</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('scripts/main.js') }}"></script>

    @livewireScripts
    @stack('scripts')
</body>

</html>