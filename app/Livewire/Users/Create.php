<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

#[Title('User Create')]

class Create extends Component
{
    public $name,$email,$password;

    public function rules(){
        return [
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8'
        ];
    }

    public function createUser(){
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' =>  bcrypt($this->password)
        ]);

        Alert::success('Success', 'Success Created User');
        return redirect('users');
    }
    public function render()
    {
        return view('livewire.users.create')->layout('layouts.main');
    }
}
