<?php

namespace App\Livewire;


use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;

class Checkout extends Component
{
    public $firstName;
    public $lastName;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $cardName;
    public $cardNumber;
    public $expiration;
    public $cvv;
    public $cartItems;
    public $subtotal;
    public $shipping;
    public $tax;
    public $total;
    public $cashOnDelivery = false;

    public $email;




    public function mount()
    {
        $this->email = \Illuminate\Support\Facades\Auth::user()->email;
        // Get the cart data from the session
        $this->cartItems = Session::get('cart', []);
        $this->subtotal = $this->calculateSubtotal();
        $this->shipping = 5.00;  // Example shipping fee
        $this->tax = $this->calculateTax();
        $this->total = $this->subtotal + $this->shipping + $this->tax;
    }

    public function calculateSubtotal()
    {
        return collect($this->cartItems)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
    }

    public function calculateTax()
    {
        // Assume a flat 10% tax rate for simplicity
        return $this->subtotal * 0.0;
    }

    public function placeOrder()
    {
        // Gather all order details
        $orderDetails = [
            'shipping_information' => [
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'zip' => $this->zip,
            ],
            'payment_information' => $this->cashOnDelivery ? 'Cash on Delivery' : [
                'card_name' => $this->cardName,
                'card_number' => $this->cardNumber,
                'expiration' => $this->expiration,
                'cvv' => $this->cvv,
            ],
            'cart_items' => $this->cartItems,
            'total' => $this->total,
        ];

        // Create the order record in the database
        $order = Order::create([
            'user_id' => \Illuminate\Support\Facades\Auth::user()->id, // Link to the authenticated user
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'cart_items' => $this->cartItems,
            'subtotal' => $this->subtotal,
            'shipping' => $this->shipping,
            'tax' => $this->tax,
            'total' => $this->total,
            'cash_on_delivery' => $this->cashOnDelivery,
        ]);

        // Send the order details to the admin (you can replace this with any method to notify the admin)
        $this->sendCheckoutDetails($orderDetails['shipping_information'], [
            'subtotal' => $this->subtotal,
            'shipping' => $this->shipping,
            'tax' => $this->tax,
            'total' => $this->total,
        ]);

        // SEND TO CUSTOMER
        $this->sendConfirmation($orderDetails['shipping_information'], [
            'subtotal' => $this->subtotal,
            'shipping' => $this->shipping,
            'tax' => $this->tax,
            'total' => $this->total,
        ]);


        // Clear the cart after the order is placed
        Session::forget('cart');

        // Redirect the user to a success page or show a success message
        return redirect()->route('home');
    }

    public function sendCheckoutDetails($shippingDetails, $orderSummary)
    {
        $cartItemsHtml = '';
        foreach ($this->cartItems as $item) {
            $cartItemsHtml .= "
        <tr>
            <td style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">{$item['name']}</td>
            <td style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">{$item['quantity']}</td>
            <td style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">{$item['price']}</td>
            <td style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">\$" . ($item['price'] * $item['quantity']) . "</td>
        </tr>
        ";
        }

        Mail::html("
    <div style=\"font-family: 'Arial', sans-serif; background: #f9f9f9; padding: 20px; border-radius: 10px; border: 1px solid #e0e0e0; max-width: 800px; margin: auto; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);\">
        <div style=\"text-align: center; margin-bottom: 20px;\">
            <h2 style=\"color: #333;\">New Order Received</h2>
        </div>
        <h3 style=\"color: #555;\">Shipping Information</h3>
        <p><strong>Name:</strong> {$shippingDetails['first_name']} {$shippingDetails['last_name']}</p>
        <p><strong>Address:</strong> {$shippingDetails['address']}, {$shippingDetails['city']}, {$shippingDetails['state']}, {$shippingDetails['zip']}</p>

        <h3 style=\"color: #555;\">Order Summary</h3>
        <table style=\"width: 100%; border-collapse: collapse; margin-bottom: 20px;\">
            <thead>
                <tr style=\"background-color: #f0f0f0;\">
                    <th style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">Product</th>
                    <th style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">Quantity</th>
                    <th style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">Price</th>
                    <th style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">Total</th>
                </tr>
            </thead>
            <tbody>
                {$cartItemsHtml}
            </tbody>
        </table>
        <p><strong>Subtotal:</strong> {$orderSummary['subtotal']}</p>
        <p><strong>Shipping:</strong> {$orderSummary['shipping']}</p>
        <p><strong>Tax:</strong> {$orderSummary['tax']}</p>
        <p><strong>Total:</strong> {$orderSummary['total']}</p>
    </div>
    ", function ($message) {
            $message->to('ateraxantonio@gmail.com')
                ->subject('New Order Placed');
        });
    }
    public function sendConfirmation($shippingDetails, $orderSummary)
    {
        $cartItemsHtml = '';
        foreach ($this->cartItems as $item) {
            $cartItemsHtml .= "
        <tr>
            <td style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">{$item['name']}</td>
            <td style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">{$item['quantity']}</td>
            <td style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">{$item['price']}</td>
            <td style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">\$" . ($item['price'] * $item['quantity']) . "</td>
        </tr>
        ";
        }

        Mail::html("
    <div style=\"font-family: 'Arial', sans-serif; background: #f9f9f9; padding: 20px; border-radius: 10px; border: 1px solid #e0e0e0; max-width: 800px; margin: auto; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);\">
        <div style=\"text-align: center; margin-bottom: 20px;\">
            <h2 style=\"color: #333;\">Order Confirmation</h2>
        </div>
        <h3 style=\"color: #555;\">Shipping Information</h3>
        <p><strong>Name:</strong> {$shippingDetails['first_name']} {$shippingDetails['last_name']}</p>
        <p><strong>Address:</strong> {$shippingDetails['address']}, {$shippingDetails['city']}, {$shippingDetails['state']}, {$shippingDetails['zip']}</p>

        <h3 style=\"color: #555;\">Order Summary</h3>
        <table style=\"width: 100%; border-collapse: collapse; margin-bottom: 20px;\">
            <thead>
                <tr style=\"background-color: #f0f0f0;\">
                    <th style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">Product</th>
                    <th style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">Quantity</th>
                    <th style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">Price</th>
                    <th style=\"padding: 8px; border: 1px solid #ddd; text-align: left;\">Total</th>
                </tr>
            </thead>
            <tbody>
                {$cartItemsHtml}
            </tbody>
        </table>
        <p><strong>Subtotal:</strong> {$orderSummary['subtotal']}</p>
        <p><strong>Shipping:</strong> {$orderSummary['shipping']}</p>
        <p><strong>Tax:</strong> {$orderSummary['tax']}</p>
        <p><strong>Total:</strong> {$orderSummary['total']}</p>
    </div>
    ", function ($message) {
            $message->to($this->email)
                ->subject('Order Confirmation');
        });
    }
    public function render()
    {
        return view('livewire.checkout');
    }
}
