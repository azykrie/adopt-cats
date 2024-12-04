<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
#[Title('Category Edit')]
class Edit extends Component
{
    public $category_name, $categoryId;
    public function rules()
    {
        return [
            'category_name' => 'required|min:3'
        ];
    }
    public function mount($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $id;
        $this->category_name = $category->category_name;
    }

    public function editCategory()
    {
        $category = Category::findOrFail($this->categoryId);
        $category->update([
            'category_name' => $this->category_name
        ]);
        Alert::success('Success', 'Category updated successfully');
        return redirect('category');
    }
    public function render()
    {
        return view('livewire.category.edit')->layout('layouts.main');
    }
}
