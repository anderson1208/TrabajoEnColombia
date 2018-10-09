<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaWork extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function employmentPreferences()
    {
    	return $this->belongsToMany(EmploymentPreference::class, 'area_work_employment_preferences'); 
    }
}
