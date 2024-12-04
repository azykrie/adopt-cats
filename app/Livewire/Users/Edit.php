<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
#[Title('User Edit')]

class Edit extends Component
{
    public $name, $email, $password, $userId;

    public function rules(){
        return [
            'name' =>'required|min:3',
            'email' =>'required|email|unique:users,email,'.$this->userId,
            'password' => 'nullable|min:8|'
        ];
    }

    public function mount($id){
        $users = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $users->name;
        $this->email = $users->email;
        $this->password = $users->password;
    }

    public function editUser(){
        $users = User::findOrFail($this->userId);
        $users->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password? bcrypt($this->password) : $users->password,
        ]);

        Alert::success('Success', 'Success Updated User');
        return redirect('users');
    }
    public function render()
    {
        return view('livewire.users.edit')->layout('layouts.main');
    }
}
