<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TransactionDetail;

class TransactionV2 extends Model
{
    //
    protected $fillable = [
        'customer_id',
        'invoice',
        'weight',
        'address',
        'total',
        'status',
        'snap_token',
    ];


public function transactionDetails()
{
    return $this->hasMany(TransactionDetail::class, 'transaction_id');
}

//     public function customer()
// {
//     return $this->belongsTo(Customer::class, 'id_pembeli');
// }
public function customer()
{
    return $this->belongsTo(Customer::class, 'customer_id');
}
    
}
