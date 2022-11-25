<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserChangePasswordComponent extends Component
{
    public $old_password;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'old_password' => 'required',
        'password' => 'required|min:8|confirmed|different:current_password',
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    } 

    public function changePassword() {
        $this->validate();
        
        if (Hash::check($this->old_password, Auth::user()->password)) {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('password_success', 'Password has been updated successfully!');
        }
        else {
            session()->flash('password_error', 'Password does not match!');
        }
    }

    public function render()
    {
        return view('livewire.user.user-change-password-component')->layout("layouts.base");
    }
}
