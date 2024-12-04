<?php

namespace App\Livewire\Cats;

use App\Models\Cats;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;
#[Title('Cats Edit')]

class Edit extends Component
{
    use WithFileUploads;
    public $cat_name, $cat_image, $about, $category_id, $existingImage, $catsId;
    public $categories;

    public function rules()
    {
        return [
            'cat_name' => 'required',
            'cat_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about' => 'required',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }

    public function mount($id)
    {
        $this->categories = Category::all();

        $cats = Cats::findOrFail($id);
        $this->catsId = $cats->id;
        $this->cat_name = $cats->cat_name;
        $this->existingImage = $cats->cat_image;
        $this->about = $cats->about;
        $this->category_id = $cats->category_id;
    }

    public function editCats()
    {
        $this->validate();


        $cats = Cats::findOrFail($this->catsId);

        $imagePath = $this->existingImage;

        if ($this->cat_image) {
            $imagePath = $this->cat_image->store('cats', 'public');

            if ($this->existingImage) {
                \Storage::delete('public/' . $this->existingImage);
            }
        }

        $cats->update([
            'cat_name' => $this->cat_name,
            'cat_image' => $imagePath,
            'about' => $this->about,
            'category_id' => $this->category_id,
        ]);

        Alert::success('Success', 'Success updated Cats');
        return redirect('cats');
    }
    public function render()
    {
        return view('livewire.cats.edit')->layout('layouts.main');
    }
}
