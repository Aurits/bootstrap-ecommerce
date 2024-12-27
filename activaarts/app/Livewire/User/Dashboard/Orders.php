<?php

namespace App\Livewire\User\Dashboard;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.user')]
class Orders extends Component
{
    public $orders;

    public function mount()
    {
        // Fetch the orders of the authenticated user
        $this->orders =  Order::where('user_id', Auth::id())->latest()->get();
    }

    public function render()
    {
        return view('livewire.user.dashboard.orders', [
            'orders' => $this->orders,
        ]);
    }
}
