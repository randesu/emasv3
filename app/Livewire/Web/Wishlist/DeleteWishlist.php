<?php

namespace App\Livewire\Web\Wishlist;

use Livewire\Component;
use App\Models\wishlist;


class DeleteWishlist extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function delete()
    {
        $wishlist = wishlist::find($this->id);

        if ($wishlist && $wishlist->id_pembeli == auth()->guard('customer')->user()->id) {
            $wishlist->delete();
            session()->flash('success', 'Item wishlist berhasil dihapus');
        } else {
            session()->flash('error', 'Item tidak ditemukan atau bukan milik Anda');
        }

        return $this->redirect('/wishlist', navigate: true);
    }

    public function render()
    {
        return view('livewire.web.wishlist.delete-wishlist');
    }
}
