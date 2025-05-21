<?php

namespace App\Livewire\Web\Cart;

use App\Models\Cart;
use Livewire\Component;
use App\Models\keranjang;

class BtnDelete extends Component
{
    public $id;
    
    /**
     * mount
     *
     * @param  mixed $cart_id
     * @return void
     */
    public function mount($id)
    {
        $this->id = $id;
    }
    
    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        $keranjang = keranjang::find($this->id);
        $keranjang->delete();

        //session flash
        session()->flash('success', 'Keranjang Berhasil Dihapus');

        //redirect
        return $this->redirect('/cart', navigate: true);
    }

    public function render()
    {
        return view('livewire.web.cart.btn-delete');
    }
}