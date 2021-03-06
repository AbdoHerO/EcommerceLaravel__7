<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'location',
        'email',
        'address',
        'phone'
    ];
}
