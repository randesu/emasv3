<?php

namespace App\Livewire\Web\Cart;

use App\Models\Cart;
use Livewire\Component;
use App\Models\keranjang;

class BtnAddToCartFull extends Component
{   
    /**
     * product_id
     *
     * @var mixed
     */
    public $id_produk;
    
    /**
     * addToCart
     *
     * @param  mixed $product_id
     * @return void
     */
    public function addToCart()
    {
        //check user is logged in
        if(!auth()->guard('customer')->check()) {

            session()->flash('warning', 'Silahkan login terlebih dahulu');

            return $this->redirect('/login', navigate: true);
        }
        
        //check cart
        $item = keranjang::where('id_produk', $this->id_produk)
                    ->where('id_pembeli', auth()->guard('customer')->user()->id)
                    ->first();
        
        //if cart already exist
        if ($item) {

            //update cart qty
            $item->increment('jumlah_beli');

        } else {

            //store cart
            $item = keranjang::create([
                'id_pembeli'   => auth()->guard('customer')->user()->id,
                'id_produk'    => $this->id_produk,
                'jumlah_beli' => 1
            ]);

        }

        // session flash
        session()->flash('success', 'Produk ditambahkan ke keranjang');

        //redirect to cart
        return $this->redirect('/cart', navigate: true);

    }
    
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.web.cart.btn-add-to-cart-full');
    }
}