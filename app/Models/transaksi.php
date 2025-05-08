<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    
   protected $fillable = ['id_pembeli','total_bayar','id_checkout', 'barcode','status_pembayaran'];

}
