<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    //

        protected $fillable = ['pembeli_id','produk_id','checkout_id', 'rating'];

        public function transaksi()
{
    return $this->belongsTo(Transaksi::class);
}

public function pembeli()
{
    return $this->belongsTo(Customer::class, 'pembeli_id');
}

public function produk()
{
    return $this->belongsTo(Produk::class, 'id');
}

public function checkout()
{
    return $this->belongsTo(Checkout::class, 'checkout_id');
}

// public function produk()
// {
//     return $this->belongsTo(Produk::class, 'produk_id');
// }

// public function pembeli()
// {
//     return $this->belongsTo(Customer::class, 'pembeli_id');
// }


}
