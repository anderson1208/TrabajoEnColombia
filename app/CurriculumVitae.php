<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculumVitae extends Model
{
    protected $fillable = [
    	'user_id', 'profession_profile', 'occupation'
    ];

    public function educationInformations()
    {
    	return $this->hasMany(EducationInformation::class, 'curriculum_vitae_id');
    }

    public function workExperiences()
    {
    	return $this->hasMany(WorkExperience::class, 'curriculum_vitae_id');
    }
}
