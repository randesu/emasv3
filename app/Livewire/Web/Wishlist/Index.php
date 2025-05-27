<?php

namespace App\Livewire\Web\Wishlist;

use Livewire\Component;
use App\Models\Wishlist;

class Index extends Component
{
    public function render()
    {
        // Ambil wishlist berdasarkan user yang sedang login
        $wishlists = Wishlist::with('produk')
            ->where('id_pembeli', auth()->guard('customer')->user()->id)
            ->latest()
            ->get();

        return view('livewire.web.wishlist.index', compact('wishlists'));
    }
}
