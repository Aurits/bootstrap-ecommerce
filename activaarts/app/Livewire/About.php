<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class About extends Component
{

    public $name;
    public $email;
    public $message;

    public $showSuccess = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string|max:1000',
    ];

    public function submit()
    {
        $this->validate();

        // Send email to admin
        Mail::html("
    <div style=\"font-family: 'Arial', sans-serif; background: #f9f9f9; padding: 20px; border-radius: 10px; border: 1px solid #e0e0e0; max-width: 600px; margin: auto; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);\">
        <div style=\"text-align: center; margin-bottom: 30px;\">
            <h1 style=\"font-family: 'Georgia', serif; font-weight: bold; color: black; margin: 0;\">
                Activa <span style=\"color: #ffb400;\">Arts</span>
            </h1>
            <p style=\"font-size: 16px; font-style: italic; color: #666; margin-top: 5px;\">
                Empowering Creativity, Inspiring Excellence
            </p>
        </div>
        <div style=\"background: #fff; border-radius: 10px; padding: 20px; border: 1px solid #ddd;\">
            <h2 style=\"color: #4CAF50; font-size: 22px; margin-bottom: 10px;\">New Contact Message</h2>
            <p style=\"font-size: 16px; margin: 5px 0;\"><strong>Name:</strong> {$this->name}</p>
            <p style=\"font-size: 16px; margin: 5px 0;\"><strong>Email:</strong> {$this->email}</p>
            <p style=\"font-size: 16px; margin: 5px 0;\"><strong>Message:</strong></p>
            <div style=\"background: #f1f8e9; border-left: 5px solid #4CAF50; padding: 15px; font-size: 16px; color: #333; border-radius: 5px; margin-top: 10px;\">
                {$this->message}
            </div>
        </div>
        <footer style=\"margin-top: 20px; text-align: center; font-size: 14px; color: #888;\">
            <p style=\"margin: 0;\">Thank you for contacting us! We will respond as soon as possible.</p>
            <p style=\"margin: 0;\">&copy; " . date('Y') . " Activaarts. All rights reserved.</p>
        </footer>
    </div>
", function ($mail) {
            $mail->to('ateraxantonio@gmail.com') // Replace with admin email
                ->subject('New Contact Message');
        });

        // Reset the form fields
        $this->reset(['name', 'email', 'message']);

        // Show success message
        $this->showSuccess = true;
    }
    public function render()
    {
        return view('livewire.about');
    }
}
