<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Home extends Component
{
    public function render()
    {
        $featuredProducts = Product::where('is_featured', 'Yes')
            ->inRandomOrder()
            ->limit(6)
            ->get();
        return view('livewire.home', compact('featuredProducts'));
    }
}
