<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Traits\VacantTrait;

use App\VacantState;

class Vacant extends Model
{
	use VacantTrait;
	
 	protected $fillable = [
 		'company_id', 'area_work_id', 'area_work_other', 'working_day_id', 'contract_type_id',  'title', 'description', 'salary', 'amount', 'expired_date', 'year_experiences', 'education_level_id', 'payment_interval_id'
 	];   

 	public function getExpiredDate()
 	{
 		$array = explode(' ', $this->expired_date);
        if($this->expired_date)
            if(isset($array[0]))
                return $array[0];

        return '';
 	}

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

 	public function areaWork()
 	{
 		return $this->belongsTo(AreaWork::class, 'area_work_id');
 	}

 	public function educationLevel()
 	{
 		return $this->belongsTo(EducationLevel::class, 'education_level_id'); 
 	}

 	public function paymentInterval()
 	{
 		return $this->belongsTo(PaymentInterval::class, 'payment_interval_id');
 	}

 	public function users()
 	{
 		return $this->belongsToMany(User::class, 'user_vacants')
 		->withPivot('vacant_state_id')
 		->using(UserVacant::class);
 	}

 	public function getTotalUsers()
 	{
 		return count($this->users);
 	}

 	public function totaUsersText()
 	{
 		$users = $this->getTotalUsers();

 		if($users > 1)
 			return "{$users} aplicados";
 		else
 			return "{$users} aplicado";
 	}
}