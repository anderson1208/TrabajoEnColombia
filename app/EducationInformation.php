<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationInformation extends Model
{
    protected $fillable = [
 		'curriculum_vitae_id', 'school_name', 'start_date', 'end_date', 'file', 'education_state_id', 'education_level_id'   	
    ];

    public function getStartDate()
    {
        $array = explode(' ', $this->start_date);
        if($this->start_date)
            if(isset($array[0]))
                return $array[0];

        return '';
    }

    public function getEndDate()
    {
        $array = explode(' ', $this->end_date);
        if($this->end_date)
            if(isset($array[0]))
                return $array[0];

        return '';
    }

    public function educationState()
    {
    	return $this->belongsTo(EducationState::class, 'education_state_id');
    }

    public function educationLevel()
    {
    	return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }
}
