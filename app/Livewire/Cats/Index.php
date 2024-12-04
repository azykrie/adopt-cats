<?php

namespace App\Livewire\Cats;

use App\Models\Cats;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
#[Title('Cats')]

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteCat($id){
        Cats::find($id)->delete();
        Alert::success('Success', 'Success Deleted Cat');
        return redirect('cats');
    }

    public function render()
    {
        $cats = Cats::with('category')
            ->where('cat_name', 'like', "%{$this->search}%")
            ->orWhereHas('category', function ($query) {
                $query->where('category_name', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(5);


        return view('livewire.cats.index', [
            'cats' => $cats
        ])->layout('layouts.main');
    }
}
