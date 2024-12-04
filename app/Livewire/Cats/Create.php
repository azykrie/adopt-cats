<?php

namespace App\Livewire\Cats;

use App\Models\Category;
use App\Models\Cats;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

#[Title('Cats Create')]

class Create extends Component
{
    use WithFileUploads;
    public $cat_name, $cat_image, $about, $category_id;
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }
    public function rules()
    {
        return [
            'cat_name' => 'required',
            'cat_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about' => 'required',
            'category_id' => 'required',
        ];
    }

    public function createCats()
    {
        $this->validate();
        
        $imagePath = $this->cat_image->store('cats', 'public');

        $cats = Cats::create([
            'cat_name' => $this->cat_name,
            'cat_image' => $imagePath, 
            'about' => $this->about,
            'category_id' => $this->category_id,
        ]);

        Alert::success('Success' , 'Success created Cats');
        return redirect()->route('cats.index');
    }
    public function render()
    {
        return view('livewire.cats.create')->layout('layouts.main');
    }
}
