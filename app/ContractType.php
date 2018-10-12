<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function vacants()
 	{
 		return $this->belongsTo(Vacant::class, 'contract_type_id');
 	}
}
