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

        ( count($this->areasWork()->get()) > 0 ) ? $fieldDirty++ : $fieldEmpty++;

        $totalField ++;
        
        return [
            'totalField'    => 	$totalField,
            'fieldDirty'    =>  $fieldDirty,
            'fieldEmpty'    =>  $fieldEmpty
        ];
    }
}
