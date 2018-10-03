<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingDay extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function vacants()
 	{
 		return $this->hasMany(Vacant::class, 'working_day_id');
 	}
}
