<?php

namespace App\Livewire\User\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.user')]
class Support extends Component
{
    public function render()
    {
        return view('livewire.user.dashboard.support');
    }
}