<?php

namespace app\Traits;

use Illuminate\Http\Request;

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

 	public function resolveFilter(array $filters)
 	{
 		$filter = [
 			'url'	=> '',
 			'filters' => array()
 		];

 		$url = '';

 		foreach($filters as $key => $param)
        {
            $url .= "&{$key}={$param}";
            
            $className = 'App\\'.$key;

            if(class_exists($className)){
            	$obj = $className::findOrFail($param);
            	array_push($filter['filters'], [
            		'key' 	=> $key,
            		'name'	=> $obj->name
            	]);
            }

            if(isset($filters['q']) && !has_in_array($filter['filters'], 'q'))
		        array_push($filter['filters'], [
		        	'key'	=>	'q',
		        	'name'	=>	$filters['q']
		        ]);
        }

        $filter['url'] = $url;

        return $filter;
 	}

 	public function deleteFilter(array $filters)
 	{
 		$url = '';

 		foreach($filters as $key => $param)
 		{
 			if($filters['delete'] != $key && $key != 'delete')
 				$url .= "&{$key}={$param}";
 		}

 		return "?".substr($url, 1);
 	}
}