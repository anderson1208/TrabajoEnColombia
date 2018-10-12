<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacantState extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function vacants()
    {
    	return $this->hasMany(UserVacant::class, 'vacant_state_id');
    }
}
