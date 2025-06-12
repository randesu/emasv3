<?php

namespace App\Livewire\Web\Products;

use App\Models\produk;
//use App\Models\Product;
use Livewire\Component;

class Show extends Component
{    
    /**
     * slug
     *
     * @var mixed
     */
    public $slug;
    
    /**
     * mount
     *
     * @param  mixed $slug
     * @return void
     */
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        //get product by slug
        $produk = produk::query()
            // /->with('category', 'category_id')
            ->withCount('ratings')
            ->withAvg('ratings', 'rating')
            ->where('slug', $this->slug)
            ->firstOrFail();

        return view('livewire.web.products.show', compact('produk'));
    }
}