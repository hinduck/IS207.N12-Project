<?php

namespace App\Http\Livewire;

use App\Events\Message;
use Illuminate\Http\Request;
use Livewire\Component;

class ChatComponent extends Component
{
    public function message (Request $request) 
    {
        event(new Message ($request->input('username'), $request->input('message')));
        return [];
    }

    public function render()
    {
        return view('livewire.chat-component')->layout("layouts.base");
    }
}
