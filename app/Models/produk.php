<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $fillable = ['nama_produk','harga','kode_produk', 'berat_barang','kadar_barang'];

    public function produkToKeranjang()
    {
        return $this->belongsTo(keranjang::class);
    }

    public function produkToCheckout()
    {
        return $this->hasMany(checkout::class);
    }

    public function produkToWishlist()
    {
        return $this->belongsTo(wishlist::class);
    }

    public function produkToCustomer()
    {
        return $this->belongsTo(customer::class);
    }
}
