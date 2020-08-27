<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'brand_name', 'quantity_ctrl', 'image_category', 'slug', 'status'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
