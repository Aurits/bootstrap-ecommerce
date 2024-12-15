<?php

namespace App\Livewire\User\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.user')]
class Wishlist extends Component
{
    public function render()
    {
        return view('livewire.user.dashboard.wishlist');
    }
}