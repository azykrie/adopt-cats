<?php

namespace App\Livewire\Auth;

use Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Login')]

class Login extends Component
{
    public $email, $password;
    public function rules(){
        return [
            'email' =>'required|email',
            'password' => 'required',
        ];
    }

    public function login(){
        $this->validate();

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){

            session()->regenerate();
            return redirect('dashboard');
        }

        $this->addError('email', 'Invalid email or password');
    }
    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }
}
