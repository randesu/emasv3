<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //

        protected $fillable = ['pembeli_id','produk_id','checkout_id', 'rating', 'customer_id', 'review'];

        public function transaksi()
{
    return $this->belongsTo(Transaksi::class);
}

public function customer()
{
    return $this->belongsTo(Customer::class, 'customer_id');
}

public function produk()
{
    return $this->belongsTo(produk::class, 'id');
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
