<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    
   protected $fillable = ['id_pembeli','total_bayar','id_checkout', 'barcode','status_pembayaran'];
public function customer()
{
    return $this->belongsTo(Customer::class, 'id_pembeli');
}

public function checkout()
{
    return $this->belongsTo(Checkout::class, 'id');
}



// public function customer()
// {
//     return $this->belongsTo(Customer::class, 'id_pembeli');
// }

//     public function transaksiToCheckout()
//     {
//         return $this->hasOne(checkout::class);
//     }
}
