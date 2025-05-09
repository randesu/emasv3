<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //
    protected $fillable = ['nama_pembeli','username_pembeli','password_pembeli','alamat_pembeli','no_hp'];


    public function customerToProduk()
    {
        return $this->hasMany(produk::class);
    }

    public function customerToUser()
    {
        return $this->belongsTo(user::class);
    }

    public function customerToTransaksi()
    {
        return $this->hasMany(transaksi::class);
    }

    // public function customerToKeranjang()
    // {
    //     return $this->belongsTo(keranjang::class, 'nama_pembeli');
    // }
}
