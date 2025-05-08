<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    //
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['id_pembeli','total_beli','alamat_pembeli', 'metode_pembayaran','timestamps'];

    public function checkoutToProduk()
    {
        return $this->belongsTo(produk::class);
    }
}
