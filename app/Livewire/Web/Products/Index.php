<?php

namespace App\Livewire\Web\Products;

use App\Models\produk;
use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        //get products
        $products = produk::query()
            //->with('category', 'ratings.customer')
            //->withAvg('ratings', 'rating')
            ->when(request()->has('search'), function ($query) {
                $query->where('slug', 'like', '%' . request()->search . '%');
            })
            ->simplePaginate(5);

        return view('livewire.web.products.index', compact('products'));
    }
}