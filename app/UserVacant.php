<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserVacant extends Pivot
{
    
    public function state()
    {
    	return $this->belongsTo(VacantState::class, 'vacant_state_id');
    }
}
