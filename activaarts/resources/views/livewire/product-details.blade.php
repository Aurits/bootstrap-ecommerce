<div>
    <main class="container py-5 mt-5">
        <div class="row">
            <div class="col-md-6 fade-in">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded" />
            </div>
            <div class="col-md-6 fade-in">
                <h1 class="mb-4">{{ $product->name }}</h1>
                <p class="lead mb-4 text-accent fw-bold">${{ number_format($product->price, 2) }}</p>
                <p class="mb-4">{{ $product->description }}</p>
                <form wire:submit.prevent="addToCart">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" wire:model="quantity" min="1" />
                    </div>
                    <button type="submit" class="btn btn-custom">
                        <span>Add to Cart</span>
                    </button>
                </form>
                <!-- Success Message -->
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="container py-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-4">Product Information</h5>
                            <div class="row text-center gy-3">
                                <div class="col-6 col-md-3">
                                    <div class="bg-light p-3 rounded h-100">
                                        <strong class="d-block text-muted">SKU</strong>
                                        <span class="fw-bold text-primary">{{ $product->sku }}</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-2">
                                    <div class="bg-light p-3 rounded h-100">
                                        <strong class="d-block text-muted">Stock</strong>
                                        <span class="fw-bold text-success">{{ $product->stock }}</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="bg-light p-3 rounded h-100">
                                        <strong class="d-block text-muted">Category</strong>
                                        <span class="fw-bold text-info">{{ $product->category }}</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="bg-light p-3 rounded h-100">
                                        <strong class="d-block text-muted">Featured</strong>
                                        <span class="fw-bold text-warning">
                                            {{ $product->is_featured ? 'Yes' : 'No' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="mt-5">
            <h2 class="text-center mb-4 fade-in">Related Products</h2>
            <div class="row g-4">
                @foreach($relatedProducts as $related)
                <div class="col-md-4 fade-in">
                    <div class="card h-100">
                        <img src="{{ $related->image_url }}" class="card-img-top" alt="{{ $related->name }}" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $related->name }}</h5>
                            <p class="card-text text-accent fw-bold">${{ number_format($related->price, 2) }}</p>
                            <a href="{{ route('products.details', ['productId' => $related->id]) }}"
                                class="btn btn-custom w-100">
                                <span>View Details</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </main>

</div>