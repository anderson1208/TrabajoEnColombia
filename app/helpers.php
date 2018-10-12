<?php
if(!function_exists('menuActive'))
{
	function menuActive($path)
	{
		$domain = explode("/", request()->path());

		if(!isset($domain[1])) return true;
		
		if($domain[1] == $path)
			return 'class = active';
	}
}

if(!function_exists('activeTab'))
{
	function activeTab($path)
	{
		$tab = (isset(request()->tab)) ? request()->tab : '' ;

		if($tab == $path)
			return true;

		return false;
	}
}