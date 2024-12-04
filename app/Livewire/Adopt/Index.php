<?php

namespace App\Livewire\Adopt;

use App\Models\Cats;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
#[Title('Adopt Cats')]

class Index extends Component
{
    use WithPagination;
    public function getWhatsAppAdoptLink($catName)  
{  
    $message = "I am interested in adopting " . $catName;  
    $phoneNumber = '6285846936354';
    
    return 'https://wa.me/' . $phoneNumber . '?text=' . urlencode($message);  
}
    public function render()
    {
        $cats = Cats::paginate(perPage: 8);
        return view('livewire.adopt.index',[
            'cats' => $cats
        ])->layout('layouts.app');
    }
}
