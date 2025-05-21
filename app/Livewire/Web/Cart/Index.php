<?php

namespace App\Livewire\Web\Cart;

use App\Models\Cart;
use Livewire\Component;
use App\Models\keranjang;

class Index extends Component
{
    public function render()
    {
        //get carts by customer
        $keranjangs = keranjang::query()
            ->with('produk')
            ->where('id_pembeli', auth()->guard('customer')->user()->id)
            ->latest()
            ->get();

        // Menghitung total berat
        // $totalWeight = $carts->sum(function ($cart) {
        //     return $cart->product->weight * $cart->qty;
        // });
    
        // Menghitung total harga
        $totalPrice = $keranjangs->sum(function ($keranjang) {
            return $keranjang->produk->harga * $keranjang->jumlah_beli;
        });

        return view('livewire.web.cart.index', compact('keranjangs','totalPrice'));
    }
}


