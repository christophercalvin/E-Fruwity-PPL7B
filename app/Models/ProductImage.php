<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'path',
        'data_produk_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\DataProduk');
    }
}

