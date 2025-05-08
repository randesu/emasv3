<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //
    protected $fillable = ['nama_pembeli','username_pembeli','password_pembeli','alamat_pembeli','no_hp'];

}
