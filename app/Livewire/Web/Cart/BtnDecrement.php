<?php

namespace App\Livewire\Web\Cart;

use App\Models\Cart;
use Livewire\Component;
use App\Models\keranjang;

class BtnDecrement extends Component
{
    public $id;
    public $id_produk;
    public $disabled;
    
    /**
     * mount
     *
     * @param  mixed $cart_id
     * @param  mixed $product_id
     * @return void
     */
    public function mount($id, $id_produk)
    {
        $this->id = $id;
        $this->id_produk = $id_produk;
    }
    
    /**
     * decrement
     *
     * @return void
     */
    public function decrement()
    {
        $keranjang = keranjang::find($this->id);
        $keranjang->decrement('jumlah_beli');

        //session flash
        session()->flash('success', 'Qty Keranjang Berhasil Dikurangi');

        //redirect
        return $this->redirect('/cart', navigate: true);
    }

    public function render()
    {
        return view('livewire.web.cart.btn-decrement');
    }
}