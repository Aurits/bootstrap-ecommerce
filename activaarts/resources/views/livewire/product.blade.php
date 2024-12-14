<div>
    <main class="container py-5 mt-5">
        <h1 class="text-center mb-4 fade-in">Our Products</h1>
        <div class="row">
            <div class="col-lg-3 mb-4 fade-in">
                <h4>Filters</h4>
                <form>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category">
                            <option selected>All Categories</option>
                            <option>Paintings</option>
                            <option>Sculptures</option>
                            <option>Craft Supplies</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="priceRange" class="form-label">Price Range</label>
                        <input type="range" class="form-range" id="priceRange" min="0" max="1000" />
                        <div class="d-flex justify-content-between">
                            <span>$0</span>
                            <span>$1000</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-custom">
                        <span>Apply Filters</span>
                    </button>
                </form>
            </div>

            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <label for="sort" class="me-2">Sort by:</label>
                        <select id="sort" class="form-select-sm">
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest</option>
                            <option>Popular</option>
                        </select>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-4 fade-in">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Artistic Canvas" />
                            <div class="card-body">
                                <h5 class="card-title">Artistic Canvas</h5>
                                <p class="card-text text-accent fw-bold">$59.99</p>
                                <a href="product-details.html" class="btn btn-custom w-100">
                                    <span>View Details</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 fade-in">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x300" class="card-img-top"
                                alt="Vibrant Acrylics Set" />
                            <div class="card-body">
                                <h5 class="card-title">Vibrant Acrylics Set</h5>
                                <p class="card-text text-accent fw-bold">$34.99</p>
                                <a href="product-details.html" class="btn btn-custom w-100">
                                    <span>View Details</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 fade-in">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Sculpting Clay" />
                            <div class="card-body">
                                <h5 class="card-title">Sculpting Clay</h5>
                                <p class="card-text text-accent fw-bold">$24.99</p>
                                <a href="product-details.html" class="btn btn-custom w-100">
                                    <span>View Details</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Add more product cards as needed -->
                </div>

                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>

</div>