<?php

namespace App\Http\Controllers\User;

use App\User;
use App\IdentificationType;
use App\EducationLevel;
use App\EducationState;
use App\CivilStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CurriculumVitaeController extends Controller
{
	protected $user;

	function __construct()
	{
		$this->middleware(function($request, $next){
			$this->user = Auth::user();

			return $next($request);
		});
	}

    public function index()
    {
    	$identificationTypes = IdentificationType::all()->pluck('name', 'id');
        $educationLevels = EducationLevel::all()->pluck('name', 'id');
        $educationStates = EducationState::all()->pluck('name', 'id');
    	$civilStatuses = CivilStatus::all()->pluck('name', 'id');

    	return view('user.partials.cv.index')
    	->with('user',$this->user)
    	->with('identificationTypes',$identificationTypes)
    	->with('civilStatuses', $civilStatuses)
        ->with('educationLevels',$educationLevels)
        ->with('educationStates',$educationStates); 
    }

    public function updatePersonalInfo(Request $request)
    {

    }
}
