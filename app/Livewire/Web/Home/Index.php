<?php

namespace App\Livewire\Web\Home;

use App\Models\produk;
use Livewire\Component;
use App\Models\Category;
use App\Models\herobanner;

class Index extends Component
{
    protected function getPopularProducts()
    {
        return produk::with('category', 'ratings.customer')
            // ->withAvg('ratings', 'rating') // Menghitung rata-rata rating
            // ->having('ratings_avg_rating', '>=', 4)
            ->limit(5)
            ->get();
    }

     protected function getLatestProducts()
    {
        //get products
        return produk::query()
            // ->with('category', 'ratings.customer')
            // ->withAvg('ratings', 'rating')
            ->limit(5)
            ->orderBy('created_at')
            ->get();
    }

    public function render()
    {
        return view('livewire.web.home.index', [

            //get sliders
            'sliders' => $sliders = HeroBanner::all(),
            
             //get categories
            'categories' => Category::latest()->get(),

             //get latest products
            'latestProducts' => $this->getLatestProducts(),

        ]);
    }
}