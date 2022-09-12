<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;

class Register extends Component
{

    public $name, $email, $password, $password_confirmation;

    public function submit(){
        $this->validate([
            'name'      => 'string|required|max:255',
            'email'     => 'email|required|unique:users',
            'password'  => 'required|confirmed'
        ]);

        User::create([
            'name' =>$this->name,
            'email' =>$this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ]);

        return redirect(route('/login'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
