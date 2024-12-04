<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
#[Title('Users')]

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteUser($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        Alert::success('Success', 'Success Deleted User');
        return redirect('users');
    }

    public function render()
    {
        $users = User::where('name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->latest()
            ->paginate(5);

        return view('livewire.users.index', [
            'users' => $users
        ])->layout('layouts.main');
    }
}
