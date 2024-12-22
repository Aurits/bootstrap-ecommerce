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
                        <form class="row g-3" wire:submit.prevent="applyFilters">
                            <div class="col-md-3">
                                <label for="productCategory" class="form-label">Category</label>
                                <select id="productCategory" class="form-select" wire:model="filterCategory">
                                    <option value="">All Categories</option>
                                    <option value="Paintings">Paintings</option>
                                    <option value="Sculptures">Sculptures</option>
                                    <option value="Photography">Photography</option>
                                    <option value="Digital Art">Digital Art</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="stockStatus" class="form-label">Stock Status</label>
                                <select id="stockStatus" class="form-select" wire:model="filterStockStatus">
                                    <option value="">All</option>
                                    <option value="In Stock">In Stock</option>
                                    <option value="Out of Stock">Out of Stock</option>
                                    <option value="Low Stock">Low Stock</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="searchProduct" class="form-label">Search Product</label>
                                <input type="text" class="form-control" id="searchProduct"
                                    placeholder="Product Name or SKU" wire:model="filterSearch" />
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
        <!-- Success Message -->
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
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
                                        <th>Featured</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($products && $products->count() > 0)
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset( $product->image_url ?? 'https://via.placeholder.com/50') }}"
                                                alt="{{ $product->name }}" class="img-thumbnail" width="50">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>${{ $product->price }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->is_featured ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <button wire:click="edit({{ $product->id }})" class="btn btn-sm btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#editProductModal">
                                                Edit
                                            </button>
                                            <button wire:click="delete({{ $product->id }})"
                                                class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="text-center">No products found.</td>
                                    </tr>
                                    @endif
                                </tbody>

                            </table>
                        </div>
                        @if($products)
                        <nav aria-label="Product list pagination">
                            {{ $products->links() }}
                        </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="2" aria-labelledby="addProductModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store" wire:key="add-product-modal">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" wire:model="name" required />
                        </div>
                        <div class="mb-3">
                            <label for="productSKU" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="productSKU" wire:model="sku" required />
                        </div>
                        <div class="mb-3">
                            <label for="productCategory" class="form-label">Category</label>
                            <select class="form-select" id="productCategory" wire:model="category" required>
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
                            <input type="number" class="form-control" id="productPrice" wire:model="price" step="0.01"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="productStock" class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" id="productStock" wire:model="stock" required />
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="productDescription" wire:model="description" rows="3"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="productImage" wire:model="image"
                                accept="image/*" wire:ignore />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" wire:click.prevent="store">Add
                        Product</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form>
                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="editProductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="editProductName" wire:model="name" required />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- SKU -->
                        <div class="mb-3">
                            <label for="editProductSKU" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="editProductSKU" wire:model="sku" required />
                            @error('sku') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label for="editProductCategory" class="form-label">Category</label>
                            <select class="form-select" id="editProductCategory" wire:model="category" required>
                                <option value="">Select a category</option>
                                <option value="paintings">Paintings</option>
                                <option value="sculptures">Sculptures</option>
                                <option value="photography">Photography</option>
                                <option value="digital-art">Digital Art</option>
                                <option value="supplies">Supplies</option>
                            </select>
                            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="editProductPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="editProductPrice" wire:model="price"
                                step="0.01" required />
                            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Stock Quantity -->
                        <div class="mb-3">
                            <label for="editProductStock" class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" id="editProductStock" wire:model="stock"
                                required />
                            @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="editProductDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editProductDescription" wire:model="description" rows="3"
                                required></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="mb-3">
                            <label for="editProductStatus" class="form-label">Featured?</label>
                            <select class="form-select" id="editProductStatus" wire:model="is_featured" required>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="update">Update
                        Product</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
window.addEventListener('show-edit-modal', () => {
    var
        myModal = new bootstrap.Modal(document.getElementById('editProductModal'));
    myModal.show();
});
</script>
<script>
window.addEventListener('addProductModal', event => {
    var myModal = bootstrap.Modal.getInstance(document.getElementById('addProductModal'));
    myModal.show();
});
</script>
@endpush