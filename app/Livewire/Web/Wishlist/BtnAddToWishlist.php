<?php

namespace App\Livewire\Web\Wishlist;

use Livewire\Component;
use App\Models\wishlist;

class BtnAddToWishlist extends Component
{

    /**
 * product_id
 *
 * @var mixed
 */
public $id_produk;

/**
 * addToWishlist
 *
 * @return void
 */
public function addToWishlist()
{
    // Cek apakah user sudah login
    if (!auth()->guard('customer')->check()) {
        session()->flash('warning', 'Silakan login terlebih dahulu');
        return $this->redirect('/login', navigate: true);
    }

    $customerId = auth()->guard('customer')->user()->id;

    // Cek apakah produk sudah ada di wishlist
    $item = \App\Models\wishlist::where('id_produk', $this->id_produk)
                ->where('id_pembeli', $customerId)
                ->first();

    if ($item) {
        // Jika sudah ada, beri notifikasi
        session()->flash('info', 'Produk sudah ada di wishlist');
    } else {
        // Tambahkan ke wishlist
        \App\Models\wishlist::create([
            'id_pembeli' => $customerId,
            'id_produk'  => $this->id_produk,
        ]);

        session()->flash('success', 'Produk ditambahkan ke wishlist');
    }

    return $this->redirect('/wishlist', navigate: true);
}
    public function render()
    {
        return view('livewire.web.wishlist.btn-add-to-wishlist', [
            'id_produk' => $this->id_produk // <-- Kirim ke Blade view
        ]);
    }

    // public function render()
    // {
    //     return view('livewire.web.wishlist.btn-add-to-wishlist');
    // }
}
