<?php

namespace App\Models;

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

   public function wishlistToProduk()
    {
        return $this->hasMany(produk::class);
    }

}
