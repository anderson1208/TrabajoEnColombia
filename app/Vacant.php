<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Vacant extends Model
{

 	protected $fillable = [
 		'company_id', 'working_day_id', 'contract_type_id',  'title', 'description', 'salary', 'expired_date', 
 	];   

 	public function company()
 	{
 		return $this->belongsTo(Company::class, 'company_id');
 	}

 	public function workingDay()
 	{
 		return $this->belongsTo(WorkingDay::class, 'working_day_id');
 	}

 	public function contractType()
 	{
 		return $this->belongsTo(ContractType::class, 'contract_type_id');
 	}
}
