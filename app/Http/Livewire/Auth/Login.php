<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    public function submit(){
        $this->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        Auth::attempt(['email' =>$this->email, 'password' => $this->password]);

        return redirect(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
