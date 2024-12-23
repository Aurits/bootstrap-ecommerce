<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $cartItems; // Cart items will always be a collection
    public $subtotal = 0;
    public $shipping = 5.00; // Fixed shipping cost
    public $tax = 0;
    public $total = 0;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        // Fetch cart items from session, ensure it's a collection
        $this->cartItems = collect(session()->get('cart', []));

        // Recalculate totals
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        // Calculate subtotal, tax, and total
        $this->subtotal = $this->cartItems->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $this->tax = $this->subtotal * 0.0; // Assume 10% tax
        $this->total = $this->subtotal + $this->shipping + $this->tax;
    }

    public function updateQuantity($itemId, $quantity)
    {
        // Update the quantity of the item in the cart
        $this->cartItems = $this->cartItems->map(function ($item) use ($itemId, $quantity) {
            if ($item['id'] == $itemId) {
                $item['quantity'] = max(1, intval($quantity)); // Ensure quantity is at least 1
            }
            return $item;
        });

        // Save updated cart to session
        session()->put('cart', $this->cartItems->toArray());

        $this->calculateTotals(); // Recalculate totals
    }

    public function removeItem($itemId)
    {
        // Filter out the item to remove
        $this->cartItems = $this->cartItems->filter(function ($item) use ($itemId) {
            return $item['id'] != $itemId;
        });

        // Save updated cart to session
        session()->put('cart', $this->cartItems->toArray());

        $this->calculateTotals(); // Recalculate totals
    }

    public function render()
    {
        return view('livewire.cart', [
            'cartItems' => $this->cartItems,
            'subtotal' => $this->subtotal,
            'shipping' => $this->shipping,
            'tax' => $this->tax,
            'total' => $this->total,
        ]);
    }
}