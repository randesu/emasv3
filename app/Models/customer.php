<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class customer extends Authenticatable
{
    //
    protected $fillable = ['nama_pembeli','username_pembeli','password','alamat_pembeli','no_hp','image','linkfoto'];


    public function customerToProduk()
    {
        return $this->hasMany(produk::class);
    }

    //     public function checkout()
    // {
    //     return $this->hasMany(checkout::class);
    // }

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
     protected static function boot()
    {
        parent::boot();

        static::saving(function ($customer) {
            if (empty($customer->linkfoto)) {
                $customer->linkfoto = 'https://vlcyusrxdnldvwmpqhcy.supabase.co/storage/v1/object/public/image-bucker/storage/v1/s3/image-bucker/image-bucker/'.$customer->fotoprofil;
                //Str::slug($category->name);
            }
        });
    }
}
