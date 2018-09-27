<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationInformation extends Model
{
    protected $fillable = [
 		'curriculum_vitae_id', 'school_name', 'start_date', 'end_date', 'certification', 'file', 'education_state_id', 'education_level_id'   	
    ];

    public function educationState()
    {
    	return $this->belongsTo(EducationSate::class, 'education_state_id');
    }

    public function educationLevel()
    {
    	return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }
}
