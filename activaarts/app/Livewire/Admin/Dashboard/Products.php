<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class Products extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard.products');
    }
}