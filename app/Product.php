<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'product_name', 'product_mark', 'product_desc', 'price', 'quantity', 'slug', 'status', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\ProductCategory');
    }

    public function productImage()
    {
        return $this->hasMany('App\ProductImage');
    }
}
