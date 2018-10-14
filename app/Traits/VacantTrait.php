<?php

namespace app\Traits;

use App\VacantState;

trait VacantTrait 
{
	public function getStyleState(VacantState $state)
 	{
 		$background = '';
 		$colorText = '';

 		if($this->vacant_state_id > $state->id){
 			$background = '#f0f0f0';
 			$colorText = '#2e2e2e';
 		}
 		else if($this->vacant_state_id == $state->id){
 			$background = '#227dc7';
 			$colorText = '#fff';	
 		}else{
 			$background = '#f0f0f0';
 			$colorText = '#939393';
 		}

 		// return "{$this->vacant_state_id} - {$state->id}";
 		return "background-color: {$background}; color: {$colorText}";
 	}
}