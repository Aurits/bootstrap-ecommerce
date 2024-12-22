<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{
    public $productId; // Receives the product ID
    public $product;
    public $relatedProducts;

    public function mount($productId)
    {
        $this->productId = $productId;

        // Fetch the product
        $this->product = Product::findOrFail($this->productId);

        // Fetch related products from the same category, excluding the current product
        $this->relatedProducts = Product::where('category', $this->product->category)
            ->where('id', '!=', $this->productId)
            ->inRandomOrder()
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.product-details');
    }
}
