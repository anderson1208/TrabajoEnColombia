<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
    	'address', 'phone', 'mobil', 'city_id'
    ];

    public function user()
    {
    	return $this->hasOne(User::class, 'address_id');
    }
}
