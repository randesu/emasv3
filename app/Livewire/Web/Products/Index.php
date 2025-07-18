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
            ->withAvg('ratings', 'rating')
            ->when(request()->has('search'), function ($query) {
                $slug = str_replace(' ', '-', request()->search);
                $query->whereRaw('slug ILIKE ?', ['%' . $slug . '%']);
            })
            ->simplePaginate(8);

        return view('livewire.web.products.index', compact('products'));
    }
}