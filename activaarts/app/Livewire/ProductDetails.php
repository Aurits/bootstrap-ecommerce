<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductDetails extends Component
{
    public $productId;
    public $product;
    public $relatedProducts;
    public $quantity = 1;

    public function mount($productId)
    {
        $this->productId = $productId;

        $this->product = Product::findOrFail($this->productId);

        $this->relatedProducts = Product::where('category', $this->product->category)
            ->where('id', '!=', $this->productId)
            ->inRandomOrder()
            ->limit(3)
            ->get();
    }

    public function addToCart()
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$this->productId])) {
            $cart[$this->productId]['quantity'] += $this->quantity;
        } else {
            $cart[$this->productId] = [
                'id' => $this->productId,
                'name' => $this->product->name,
                'price' => $this->product->price,
                'quantity' => $this->quantity,
                'image_url' => $this->product->image_url,
            ];
        }

        Session::put('cart', $cart);
        session()->flash('success', 'Product added to cart successfully!');
    }

    public function render()
    {
        return view('livewire.product-details');
    }
}