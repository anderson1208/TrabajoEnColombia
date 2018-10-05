<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = [
    	'curriculum_vitae_id', 'company', 'start_date', 'end_date', 'charge', 'functions', 'boss_name', 'phone', 'file'
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
}
