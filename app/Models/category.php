<?php

namespace App\Models;
use Illuminate\Support\Str;

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
    }

}