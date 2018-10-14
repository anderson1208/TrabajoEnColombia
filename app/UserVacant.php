<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Traits\VacantTrait;

use App\VacantState;

class UserVacant extends Pivot
{
	use VacantTrait;

    public function state()
    {
    	return $this->belongsTo(VacantState::class, 'vacant_state_id');
    }

    public function vacant()
    {
    	return $this->belongsTo(Vacant::class, 'vacant_id');
    }
}
