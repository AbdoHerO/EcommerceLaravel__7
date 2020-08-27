<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'image_title', 'image_product', 'slug', 'status', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
