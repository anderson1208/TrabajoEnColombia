<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurriculumVitae extends Model
{
    protected $fillable = [
    	'user_id', 'profession_profile', 'occupation'
    ];

    public function formations()
    {
    	return $this->hasMany(EducationInformation::class, 'curriculum_vitae_id');
    }

    public function workExperiences()
    {
    	return $this->hasMany(WorkExperience::class, 'curriculum_vitae_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
