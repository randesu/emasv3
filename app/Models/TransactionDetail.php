<?php

namespace App\Models;

use App\Models\produk;
use App\Models\TransactionV2;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    //
    protected $fillable = [
        'transaction_id',
        'id_produk',
        'qty',
        'price',
    ];

    public function transaction()
    {
        return $this->belongsTo(TransactionV2::class, 'id');
    }

    public function product()
    {
        return $this->belongsTo(produk::class, 'id');
    }
}
