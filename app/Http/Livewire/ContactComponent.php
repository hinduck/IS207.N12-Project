<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\Setting;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'comment' => 'required'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function sendMessage() {
        $this->validate();
        
        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->comment = $this->comment;
        $contact->save();
        session()->flash('message', 'Message has been sent successfully!');
    }
    
    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.contact-component', ['setting' => $setting])->layout("layouts.base");
    }
}
