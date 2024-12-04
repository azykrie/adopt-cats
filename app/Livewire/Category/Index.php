<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
#[Title('Category')]

class Index extends Component
{
    public $search;
    use WithPagination;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        Alert::success('Success', 'Success Deleted category');
        return redirect('category');
    }
    public function render()
    {
        $category = Category::where('category_name', 'like', "%{$this->search}%")
            ->latest()
            ->paginate(5);
        return view('livewire.category.index', [
            'category' => $category
        ])->layout('layouts.main');
    }
}
