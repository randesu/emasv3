<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class herobanner extends Model
{
    protected $fillable = ['nama','gambar','set_active', 'link_gambar'];

     protected static function boot()
    {
        parent::boot();

        // Generate slug before saving
        static::saving(function ($herobanner) {
            if (empty($herobanner->link_gambar)) {
                $herobanner->link_gambar = 'https://vlcyusrxdnldvwmpqhcy.supabase.co/storage/v1/object/public/image-bucker/storage/v1/s3/image-bucker/image-bucker/'.$herobanner->gambar;
            }
        });
    }

}
