<?php

namespace App\Livewire\User\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Product;

#[Layout('layouts.user')]
class Home extends Component
{
    public function render()
    {
        $featuredProducts = Product::where('is_featured', '1')
            ->inRandomOrder()
            ->limit(3)
            ->get();
        return view('livewire.user.dashboard.home', compact('featuredProducts'));
    }
}
