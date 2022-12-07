<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreatePaypal extends Component
{
    public function render()
    {
        return view('livewire.create-paypal')->layout("layouts.base");
    }
}
