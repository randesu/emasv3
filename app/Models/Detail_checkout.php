<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_checkout extends Model
{
    //
    protected $fillable = ['id_produk','total_beli','harga_produk', 'id_pembeli'];

}
