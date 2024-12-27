<div class="main-content">
    <!-- Header -->
    <header class="dashboard-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <h1>Customer Management</h1>
            <button class="btn btn-custom" wire:click="create" data-bs-toggle="modal" data-bs-target="#customerModal">
                Add Customer
            </button>
        </div>
    </header>

    <!-- Filter Section -->
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-body">
                <h5>Filter Customers</h5>
                <form class="row">
                    <div class="col-md-3 mb-3">
                        <label for="filterName" class="form-label">Name</label>
                        <input type="text" id="filterName" class="form-control" wire:model="name">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="filterEmail" class="form-label">Email</label>
                        <input type="text" id="filterEmail" class="form-control" wire:model="email">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="filterStatus" class="form-label">Status</label>
                        <select id="filterStatus" class="form-select" wire:model="status">
                            <option value="">All</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="filterRole" class="form-label">Role</label>
                        <select id="filterRole" class="form-select" wire:model="roles">
                            <option value="">All</option>
                            <option value="customer">Customer</option>
                            <option value="admin">Admin</option>
                            <option value="support">Customer Support</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button class="btn btn-custom w-100" wire:click="applyFilters">Apply Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Customer List -->
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-body">
                <h5>Customer List</h5>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    <span
                                        class="badge {{ $customer->status === 'active' ? 'bg-success' : 'bg-warning' }}">
                                        {{ ucfirst($customer->status) }}
                                    </span>
                                </td>
                                <td>{{ ucfirst($customer->roles) }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" wire:click="edit({{ $customer->id }})"
                                        data-bs-toggle="modal" data-bs-target="#customerModal">
                                        Edit
                                    </button>
                                    <button class="btn btn-sm btn-danger" wire:click="delete({{ $customer->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $customers->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customerModalLabel">
                            {{ $modalMode === 'create' ? 'Add Customer' : 'Edit Customer' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" wire:model="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" wire:model="email">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" class="form-select" wire:model="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" class="form-select" wire:model="roles">
                                <option value="user">Customer</option>
                                <option value="admin">Admin</option>
                                <option value="support">Customer Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>