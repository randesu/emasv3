<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $fillable = ['nama_produk','harga','kode_produk', 'slug','berat_barang','kadar_barang','gambar_produk', 'category_id'];

    public function produkToKeranjang()
    {
        return $this->belongsTo(keranjang::class);
    }

    public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}
    // public function produkToCategory()
    // {
    //     return $this->hasMany(category::class);
    // }

    public function produkToCheckout()
    {
        return $this->hasMany(checkout::class);
    }

    public function produkToWishlist()
    {
        return $this->belongsTo(wishlist::class);
    }

    public function produkToCustomer()
    {
        return $this->belongsTo(customer::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Generate slug before saving
        static::saving(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->nama_produk);
            }
        });

        static::saving(function ($product) {
            if (empty($product->linkgambar)) {
                $product->linkgambar = 'https://vlcyusrxdnldvwmpqhcy.supabase.co/storage/v1/object/public/image-bucker/storage/v1/s3/image-bucker/image-bucker/'.$product->gambar_produk;
                //Str::slug($category->name);
            }
        });
    }
}
