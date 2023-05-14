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

    public function getPercentageCompleteProfile()
    {
        $totalField = 0;
        $fieldEmpty = 0;
        $fieldDirty = 0;
        // Get points from personal information
        foreach($this->fillable as $field)
        {
            if($this->$field)
                $fieldDirty++;
            else
                $fieldEmpty++;

            $totalField++;
        }

        ( count($this->formations()->get()) > 0 ) ? $fieldDirty++ : $fieldEmpty++;
        ( count($this->workExperiences()->get()) > 0 ) ? $fieldDirty++ : $fieldEmpty++;

        $totalField += 2;
        
        return [
            'totalField'    => $totalField,
            'fieldDirty'    =>  $fieldDirty,
            'fieldEmpty'    =>  $fieldEmpty
        ];
    }
}
