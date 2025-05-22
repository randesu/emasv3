<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    ];

//     public function customer()
// {
//     return $this->belongsTo(Customer::class, 'id_pembeli');
// }
public function customer()
{
    return $this->belongsTo(Customer::class, 'customer_id');
}
    
}
