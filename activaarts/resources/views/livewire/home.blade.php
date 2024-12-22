<div>
    <main>
        <section class="hero">
            <div class="container text-center">
                <h1 class="display-4 mb-4 fade-in">Welcome to Activa Arts</h1>
                <p class="lead mb-5 fade-in">
                    Discover unique artworks and craft supplies that inspire creativity
                </p>
                <a href="{{ route('products') }}" class="btn btn-custom btn-lg fade-in">
                    <span>Explore Our Collection</span>
                </a>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-4 fade-in">Featured Products</h2>
                <div class="row g-4 product-grid">
                    @foreach($featuredProducts as $product)
                    <div class="col fade-in">
                        <div class="card h-100">
                            <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300x300' }}"
                                class="card-img-top img-fluid" alt="{{ $product->name }}" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <!-- <p class="card-text">
                                    {{ $product->description }}
                                </p> -->
                                <p class="card-text text-accent fw-bold">${{ number_format($product->price, 2) }}</p>
                                <a href="{{ route('products.details', ['productId' => $product->id]) }}"
                                    class="btn btn-custom w-100">
                                    <span>View Details</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>


        <section class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4 fade-in">Why Choose Us</h2>
                <div class="row g-4">
                    <div class="col-md-4 fade-in">
                        <div class="text-center">
                            <i class="bi bi-palette display-4 text-accent"></i>
                            <h3 class="h5 mt-3">Quality Products</h3>
                            <p>Curated selection of premium art supplies</p>
                        </div>
                    </div>
                    <div class="col-md-4 fade-in">
                        <div class="text-center">
                            <i class="bi bi-truck display-4 text-accent"></i>
                            <h3 class="h5 mt-3">Fast Shipping</h3>
                            <p>Quick and reliable delivery worldwide</p>
                        </div>
                    </div>
                    <div class="col-md-4 fade-in">
                        <div class="text-center">
                            <i class="bi bi-heart display-4 text-accent"></i>
                            <h3 class="h5 mt-3">Customer Support</h3>
                            <p>Dedicated team to assist you</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>