<?php

namespace App\Livewire\Web\Cart;

use Livewire\Component;
use App\Models\keranjang;

class BtnAddToCartFull extends Component
{
    public $id_produk;
    public $jumlah = 1;

    public function mount($id_produk)
    {
        $this->id_produk = $id_produk;
    }

    public function addToCart()
    {
        if (!auth()->guard('customer')->check()) {
            session()->flash('warning', 'Silahkan login terlebih dahulu');
            return $this->redirect('/login', navigate: true);
        }

        if ($this->jumlah < 1) {
            $this->jumlah = 1;
        }

        $userId = auth()->guard('customer')->user()->id;

        $item = keranjang::where('id_produk', $this->id_produk)
            ->where('id_pembeli', $userId)
            ->first();

        if ($item) {
            $item->increment('jumlah_beli', $this->jumlah);
        } else {
            keranjang::create([
                'id_pembeli'   => $userId,
                'id_produk'    => $this->id_produk,
                'jumlah_beli'  => $this->jumlah
            ]);
        }

        session()->flash('success', 'Produk ditambahkan ke keranjang');
        return $this->redirect('/cart', navigate: true);
    }

    public function render()
    {
        return view('livewire.web.cart.btn-add-to-cart-full');
    }
}
