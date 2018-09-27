<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    protected $fillable = [
    	'curriculum_vitae_id', 'company', 'start_date', 'end_date', 'charge', 'functions', 'boss_name', 'phone', 'file'
    ];
}
