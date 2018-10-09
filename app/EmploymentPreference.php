<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentPreference extends Model
{
    protected $fillable = [
    	'miniun_salary'
    ];

    public function areasWork()
    {
    	return $this->belongsToMany(AreaWork::class, 'area_work_employment_preferences'); 
    }
}
