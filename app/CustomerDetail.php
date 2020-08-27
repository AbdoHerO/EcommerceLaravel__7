<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'f_name',
        'l_name',
        'company_name',
        'phone',
        'email',
        'country',
        'address1',
        'address2',
        'town',
        'district',
        'post_code',
        'other_notes'
    ];

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
