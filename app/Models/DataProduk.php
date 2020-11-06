<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataProduk extends Model
{
    protected $fillable=[
        'NamaProduk',
        'StokProduk',
        'DeskripsiProduk',
        'HargaProduk',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImage');
    }



}
