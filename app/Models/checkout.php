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

    public function transaksiToCheckout()
    {
        return $this->belongsTo(checkout::class);
    }

    public function checkoutToKeranjang()
    {
        return $this->belongsTo(kerajang::class);
    }

public function customer()
{
    return $this->belongsTo(Customer::class, 'id_pembeli');
}

}
