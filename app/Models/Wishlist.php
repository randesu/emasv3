<?php

namespace App\Models;

use App\Models\Customer; // atau Pembeli, sesuaikan
use App\Models\produk;

use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    //
    /*
    * fillable
    *
    * @var array
    */
   protected $fillable = ['id_pembeli', 'id_produk'];

  public function pembeli()
    {
        return $this->belongsTo(Customer::class, 'id_pembeli');
    }

    // Relasi ke tabel produk
    public function produk()
    {
        return $this->belongsTo(produk::class, 'id_produk');
    }
}
