<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    //
    protected $fillable = ['id_pembeli','id_produk','jumlah_beli'];

    public function keranjangToProduk()
    {
        return $this->hasMany(produk::class);
    }
    
    public function keranjangToCheckout()
    {
        return $this->hasOne(checkout::class);
    }

    public function keranjangToPembeli()
    {
        return $this->hasMany(customer::class);
    }

}
