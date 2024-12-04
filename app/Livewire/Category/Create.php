<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
#[Title('Category Create')]

class Create extends Component
{
    public $category_name;

    public function rules(){
        return [
            'category_name' =>'required|unique:categories|max:255',
        ];
    }

    public function createCategory(){
        $this->validate();

        $category = Category::create([
            'category_name' => $this->category_name
        ]);
        
        Alert::success('Success', 'Category created successfully');
        return redirect('category');
    }
    public function render()
    {
        return view('livewire.category.create')->layout('layouts.main');
    }
}
