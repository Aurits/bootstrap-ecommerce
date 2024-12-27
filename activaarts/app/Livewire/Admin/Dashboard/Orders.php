<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Orders extends Component
{
    use WithPagination;

    public $filters = [
        'status' => 'All',
        'dateRange' => 'All Time',
        'search' => ''
    ];

    public $expandedOrderIds = [];

    public function toggleDetails($orderId)
    {
        if (in_array($orderId, $this->expandedOrderIds)) {
            $this->expandedOrderIds = array_diff($this->expandedOrderIds, [$orderId]);
        } else {
            $this->expandedOrderIds[] = $orderId;
        }
    }

    public function render()
    {
        $orders = Order::query()
            ->when($this->filters['status'] !== 'All', function ($query) {
                $query->where('status', $this->filters['status']);
            })
            ->when($this->filters['search'], function ($query) {
                $query->where('id', $this->filters['search'])
                    ->orWhere('first_name', 'like', '%' . $this->filters['search'] . '%')
                    ->orWhere('last_name', 'like', '%' . $this->filters['search'] . '%');
            })
            ->paginate(10);

        foreach ($orders as $order) {
            $order->isExpanded = in_array($order->id, $this->expandedOrderIds);
        }

        return view('livewire.admin.dashboard.orders', [
            'orders' => $orders,
        ]);
    }
}
