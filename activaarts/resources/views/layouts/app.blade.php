<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ===== DYNAMIC PAGE TITLE ===== -->
    <!-- Example: For the home page, you might do something like:
         <title>Activaarts - Unique Artworks &amp; Craft Supplies | Home</title>
         or pass in a variable from your controller. -->
    <title>@yield('page_title', 'Activaarts - Unique Artworks & Craft Supplies')</title>

    <!-- ===== META DESCRIPTION ===== -->
    <!-- Make sure this accurately describes each page’s content. -->
    <meta name="description"
        content="Discover unique artworks and craft supplies that inspire creativity and bring art into everyday life. Browse paintings, sculptures, digital art, and more.">

    <!-- ===== KEYWORDS (Optional) ===== -->
    <!-- Many search engines ignore meta keywords, but you can still include them if you want. -->
    <meta name="keywords" content="Art, Paintings, Sculptures, Crafts, Handmade, Activaarts">

    <!-- ===== OPEN GRAPH TAGS ===== -->
    <!-- Helps when your link is shared on social media (Facebook, LinkedIn, etc.) -->
    <meta property="og:title" content="@yield('og_title', 'Activaarts - Unique Artworks & Craft Supplies')" />
    <meta property="og:description" content="Discover unique artworks and craft supplies that inspire creativity and bring art into everyday life." />
    <!-- Use a relevant image for your social sharing preview -->
    <meta property="og:image" content="{{ asset('logo.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

    <!-- ===== TWITTER CARD TAGS ===== -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Activaarts - Unique Artworks & Craft Supplies')">
    <meta name="twitter:description" content="Discover unique artworks and craft supplies that inspire creativity and bring art into everyday life.">
    <meta name="twitter:image" content="{{ asset('logo.png') }}">

    <!-- Bootstrap & Icons & Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('styles/custom.css') }}">

    <!-- Google Fonts or Bunny Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    @livewireStyles
</head>

<body class="font-sans antialiased" oncontextmenu="return false;">
    <div class="min-h-screen">
        <!-- ============= HEADER / NAVBAR ============= -->
        <header>
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                        <img src="{{ asset('logo.png') }}" alt="Activa Arts Logo" class="navbar-logo me-2">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <i class="bi bi-list"></i>
                    </button>
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
                                </a>
                            </li>
                            @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle hover-effect" href="#" id="userDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i>
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end animate slideIn"
                                    aria-labelledby="userDropdown">
                                    @if(auth()->user()->roles == 'admin')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.dashboard.home') }}">
                                            <i class="bi bi-speedometer2 me-2"></i>Dashboard
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            <i class="bi bi-grid me-2"></i>Dashboard
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <i class="bi bi-person me-2"></i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </a>
                                    </li>
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
        <!-- ============= /HEADER/NAVBAR ============= -->

        <main>
            <!-- Main Content Here -->
            {{ $slot }}
        </main>

        <!-- ============= FOOTER ============= -->
        <footer class="footer-section">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="footer-brand">
                            <img src="{{ asset('logo.png') }}" alt="Activa Arts Logo" class="footer-logo mb-3">
                        </div>
                        <p class="footer-description">
                            Discover unique artworks and craft supplies that inspire creativity and bring art into everyday life.
                        </p>
                        <div class="newsletter-form">
                            <h6 class="newsletter-title">Stay Updated</h6>
                            <form class="d-flex gap-2">
                                <input type="email" class="form-control" placeholder="Enter your email">
                                <button type="submit" class="btn btn-custom">
                                    <i class="bi bi-send-fill"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <h5 class="footer-title">Quick Links</h5>
                        <ul class="footer-links">
                            <li><a href="{{ route('home') }}"><i class="bi bi-chevron-right"></i>Home</a></li>
                            <li><a href="{{ route('products') }}"><i class="bi bi-chevron-right"></i>Products</a></li>
                            <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right"></i>About Us</a></li>
                            <li><a href="{{ route('about') }}#contact"><i class="bi bi-chevron-right"></i>Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <h5 class="footer-title">Categories</h5>
                        <ul class="footer-links">
                            <li><a href="#"><i class="bi bi-chevron-right"></i>Paintings</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i>Sculptures</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i>Digital Art</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i>Craft Supplies</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <h5 class="footer-title">Connect With Us</h5>
                        <div class="social-links">
                            <a href="#" class="social-link" aria-label="Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="Instagram">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="Twitter">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="Pinterest">
                                <i class="bi bi-pinterest"></i>
                            </a>
                        </div>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>Kampala (Uganda)</p>
                            </div>
                            <div class="contact-item">
                                <i class="bi bi-envelope-fill"></i>
                                <p><a href="mailto:activaartsug@gmail.com">activaartsug@gmail.com</a></p>
                            </div>
                            <div class="contact-item">
                                <i class="bi bi-telephone-fill"></i>
                                <p>(+256) 704416545/773559912</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="footer-divider">
                <div class="footer-bottom">
                    <p>&copy; 2025 Activaarts. All rights reserved.</p>
                </div>
            </div>
        </footer>
        <!-- ============= /FOOTER ============= -->
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Item added to cart successfully!
            </div>
        </div>
    </div>

    @livewireScripts

    <!-- JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('scripts/main.js') }}"></script>
    @stack('scripts')
</body>

</html>