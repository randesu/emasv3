<?php

namespace App\Livewire\Web\Home;

use Livewire\Component;
use App\Models\Category;



class Header extends Component
{
    public function render()
    {
        
        return view('livewire.web.home.header', [
             //get categories
            'categories' => Category::latest()->get(),


        ]);
    }
}


