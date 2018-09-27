<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
 	protected $fillable = [
 		'company_id', 'title', 'description', 'expired_date', 
 	];   

 	public function company()
 	{
 		return $this->belongsTo(Company::class, 'company_id');
 	}

}
