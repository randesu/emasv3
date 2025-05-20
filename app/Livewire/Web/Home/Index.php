<?php

namespace App\Livewire\Web\Home;

use App\Models\herobanner;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.web.home.index', [

            //get sliders
            'sliders' => $sliders = HeroBanner::all(),
            
        ]);
    }
}