<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
	
	use Notifiable;

    protected $fillable = [
    	'name', 'description', 'nit', 'address_id', 'email', 'email_verified_at', 'password', 'avatar'
    ];

    public function address()
    {
    	return $this->belongsTo(Address::class, 'address_id');
    }
    
    public function vacants()
    {
        return $this->hasMany(Vacant::class, 'company_id'); 
    }
}
