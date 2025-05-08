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
}
