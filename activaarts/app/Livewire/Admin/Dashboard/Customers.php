<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Customers extends Component
{
    use WithPagination;

    // Filter properties
    public $name;
    public $email;
    public $status;
    public $roles;

    // Customer properties for create/edit
    public $customerId;
    public $modalMode = 'create'; // 'create' or 'edit'

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'status' => 'required|in:active,inactive',
        'roles' => 'required|in:customer,admin,support',
    ];

    public function mount()
    {
        $this->resetFilters();
    }

    public function resetFilters()
    {
        $this->name = null;
        $this->email = null;
        $this->status = null;
        $this->roles = null;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function applyFilters()
    {
        // Refresh the customer list based on filters
        $this->resetPage();
    }

    public function create()
    {
        $this->resetForm();
        $this->modalMode = 'create';
    }

    public function edit($id)
    {
        $this->customerId = $id;
        $customer = User::findOrFail($id);

        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->status = $customer->status;
        $this->roles = $customer->roles;

        $this->modalMode = 'edit';
    }

    public function save()
    {
        if ($this->modalMode === 'create') {
            $this->validate();

            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'status' => $this->status,
                'roles' => $this->roles,
            ]);

            session()->flash('message', 'Customer added successfully.');
        } elseif ($this->modalMode === 'edit') {
            $customer = User::findOrFail($this->customerId);

            $this->validate([
                'email' => 'required|email|unique:users,email,' . $customer->id,
            ]);

            $customer->update([
                'name' => $this->name,
                'email' => $this->email,
                'status' => $this->status,
                'roles' => $this->roles,
            ]);

            session()->flash('message', 'Customer updated successfully.');
        }

        $this->resetForm();
        // $this->emit('closeModal'); // Close modal using JavaScript
    }

    public function delete($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();

        session()->flash('message', 'Customer deleted successfully.');
    }

    public function resetForm()
    {
        $this->customerId = null;
        $this->name = null;
        $this->email = null;
        $this->status = null;
        $this->roles = null;
    }

    public function render()
    {
        $customers = User::query()
            ->when($this->name, fn($query) => $query->where('name', 'like', '%' . $this->name . '%'))
            ->when($this->email, fn($query) => $query->where('email', 'like', '%' . $this->email . '%'))
            ->when($this->status, fn($query) => $query->where('status', $this->status))
            ->when($this->roles, fn($query) => $query->where('roles', $this->roles))
            ->paginate(5);

        return view('livewire.admin.dashboard.customers', compact('customers'));
    }
}
