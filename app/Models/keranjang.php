<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    //
    protected $fillable = ['id_pembeli','id_produk','jumlah_beli'];

    // public function keranjangToProduk()
    // {
    //     return $this->hasMany(produk::class);
    // }

    public function produk()
{
    return $this->belongsTo(produk::class, 'id_produk');
}
    
    public function keranjangToCheckout()
    {
        return $this->hasOne(checkout::class);
    }

    // public function keranjangToPembeli()
    // {
    //     return $this->hasMany(customer::class, 'id');
    // }

    public function customer()
{
    return $this->belongsTo(Customer::class, 'id_pembeli');
}

}
