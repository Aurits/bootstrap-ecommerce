<div>
    <main class="container py-5 mt-5">
        <h1 class="text-center mb-4 fade-in">Our Products</h1>
        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-lg-3 mb-4 fade-in">
                <h4>Filters</h4>
                <form>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" wire:model="category">
                            <option>All Categories</option>
                            <option>Paintings</option>
                            <option>Sculptures</option>
                            <option>Craft Supplies</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="priceRange" class="form-label">Price Range</label>
                        <input type="range" class="form-range" id="priceRange" wire:model="priceRange" min="0"
                            max="1000" />
                        <div class="d-flex justify-content-between">
                            <span>$0</span>
                            <span>${{ $priceRange }}</span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-custom" wire:click="filter">
                        <span>Apply Filters</span>
                    </button>
                </form>
            </div>

            <!-- Products and Sorting -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <label for="sort" class="me-2">Sort by:</label>
                        <select id="sort" class="form-select-sm" wire:model="sortBy">
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest</option>
                            <option>Popular</option>
                        </select>
                    </div>
                </div>

                <!-- Product Cards -->
                <div class="row g-4">
                    @forelse($products as $product)
                    <div class="col-md-4 fade-in">
                        <div class="card h-100">
                            <img src="{{ $product->getImageUrlAttribute() }}" class="card-img-top"
                                alt="{{ $product->name }}" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text text-accent fw-bold">${{ $product->price }}</p>
                                <a href="{{ route('products.details', ['productId' => $product->id]) }}"
                                    class="btn btn-custom w-100">
                                    <span>View Details</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-center">No products found.</p>
                    @endforelse
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation" class="mt-4">
                    {{ $products->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
    </main>
</div>