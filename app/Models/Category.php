<?php

namespace App\Models;
use Illuminate\Support\Str;
use App\Models\produk; 

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $fillable = ['image', 'name', 'slug'];


public function produks()
{
    return $this->hasMany(Produk::class, 'category_id');
}


    protected static function boot()
    {
        parent::boot();

        // Generate slug before saving
        static::saving(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::saving(function ($category) {
            if (empty($category->imagelink)) {
                $category->imagelink = 'https://vlcyusrxdnldvwmpqhcy.supabase.co/storage/v1/object/public/image-bucker/storage/v1/s3/image-bucker/image-bucker/'.$category->image;
                //Str::slug($category->name);
            }
        });
    }

}