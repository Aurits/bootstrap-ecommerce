<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Home extends Component
{
    public $totalOrders;
    public $revenue;
    public $pendingOrders;
    public $newCustomers;

    public function mount()
    {
        $this->totalOrders = Order::count();
        $this->revenue = Order::sum('total');
        $this->pendingOrders = Order::whereNull('cash_on_delivery')->count();
        $this->newCustomers = User::where('roles', User::ROLE_USER)
            ->where('created_at', '>=', now()->subMonth())
            ->count();
    }

    public function render()
    {
        $recentOrders = Order::latest()->take(5)->get();
        return view('livewire.admin.dashboard.home', [
            'recentOrders' => $recentOrders,
        ]);
    }
}
