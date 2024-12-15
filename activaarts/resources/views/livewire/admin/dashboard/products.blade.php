<div class="main-content">
    <header class="dashboard-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h1>Manage Products</h1>
                </div>
                <div class="col-auto">
                    <div class="user-menu dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="https://via.placeholder.com/40" alt="Admin" class="rounded-circle" />
                            <span>Admin User</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard.settings') }}">Settings</a>
                            <li>
                                <hr class="dropdown-divider" />
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
                        <h5 class="card-title">Product Filters</h5>
                        <form class="row g-3">
                            <div class="col-md-3">
                                <label for="productCategory" class="form-label">Category</label>
                                <select id="productCategory" class="form-select">
                                    <option selected>All Categories</option>
                                    <option>Paintings</option>
                                    <option>Sculptures</option>
                                    <option>Photography</option>
                                    <option>Digital Art</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="stockStatus" class="form-label">Stock Status</label>
                                <select id="stockStatus" class="form-select">
                                    <option selected>All</option>
                                    <option>In Stock</option>
                                    <option>Out of Stock</option>
                                    <option>Low Stock</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="searchProduct" class="form-label">Search Product</label>
                                <input type="text" class="form-control" id="searchProduct"
                                    placeholder="Product Name or SKU" />
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-custom w-100">
                                    Apply Filters
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="bi bi-plus-circle"></i> Add New Product
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Product List</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>SKU</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="https://via.placeholder.com/50" alt="Product 1"
                                                class="img-thumbnail" />
                                        </td>
                                        <td>Artistic Canvas</td>
                                        <td>ART-001</td>
                                        <td>Paintings</td>
                                        <td>$49.99</td>
                                        <td>25</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editProductModal">
                                                Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="https://via.placeholder.com/50" alt="Product 2"
                                                class="img-thumbnail" />
                                        </td>
                                        <td>Acrylic Paint Set</td>
                                        <td>ART-002</td>
                                        <td>Supplies</td>
                                        <td>$24.99</td>
                                        <td>50</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editProductModal">
                                                Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="https://via.placeholder.com/50" alt="Product 3"
                                                class="img-thumbnail" />
                                        </td>
                                        <td>Abstract Sculpture</td>
                                        <td>ART-003</td>
                                        <td>Sculptures</td>
                                        <td>$199.99</td>
                                        <td>10</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editProductModal">
                                                Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Product list pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">
                        Add New Product
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" required />
                        </div>
                        <div class="mb-3">
                            <label for="productSKU" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="productSKU" required />
                        </div>
                        <div class="mb-3">
                            <label for="productCategory" class="form-label">Category</label>
                            <select class="form-select" id="productCategory" required>
                                <option value="">Select a category</option>
                                <option value="paintings">Paintings</option>
                                <option value="sculptures">Sculptures</option>
                                <option value="photography">Photography</option>
                                <option value="digital-art">Digital Art</option>
                                <option value="supplies">Supplies</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="productPrice" step="0.01" required />
                        </div>
                        <div class="mb-3">
                            <label for="productStock" class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" id="productStock" required />
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="productDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="productImage" accept="image/*" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Add Product
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">
                        Edit Product
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editProductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="editProductName" value="Artistic Canvas"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="editProductSKU" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="editProductSKU" value="ART-001" required />
                        </div>
                        <div class="mb-3">
                            <label for="editProductCategory" class="form-label">Category</label>
                            <select class="form-select" id="editProductCategory" required>
                                <option value="">Select a category</option>
                                <option value="paintings" selected>Paintings</option>
                                <option value="sculptures">Sculptures</option>
                                <option value="photography">Photography</option>
                                <option value="digital-art">Digital Art</option>
                                <option value="supplies">Supplies</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editProductPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="editProductPrice" value="49.99" step="0.01"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="editProductStock" class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" id="editProductStock" value="25" required />
                        </div>
                        <div class="mb-3">
                            <label for="editProductDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editProductDescription" rows="3" required>
High-quality artistic canvas for all your painting needs.</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editProductImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="editProductImage" accept="image/*" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>