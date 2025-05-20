<?php

namespace App\Livewire\Web\Home;

use App\Models\produk;
use App\Models\rating;
use Livewire\Component;
use App\Models\Category;
use App\Models\herobanner;

class Index extends Component
{

    protected function getPopularProducts()
{
    // Ambil semua produk dengan rata-rata rating
    $produks = Produk::withAvg('ratings', 'rating')->get();

    // Filter hanya yang rating-nya >= 4, lalu ambil 5 teratas
    return $produks->filter(function ($produk) {
        return $produk->ratings_avg_rating >= 4;
    })->take(5);
}


//     protected function getPopularProducts()
// {
//     return Produk::withAvg('ratings', 'rating') // relasi 'ratings', kolom 'rating'
//         ->having('ratings_avg_rating', '>=', 4)
//         ->limit(5)
//         ->get();
// }

    // protected function getPopularProducts()
    // {
    //     return rating::query()
    //         ->withAvg('rating','rating') // Menghitung rata-rata rating
    //         ->having('ratings_avg_rating', '>=', 4)
    //         ->limit(5)
    //         ->get();
    // }

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
            
            //get popular
            'popularProducts' => $this->getPopularProducts(),

        ]);
    }
}