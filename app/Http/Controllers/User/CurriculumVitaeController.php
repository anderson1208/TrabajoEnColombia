<?php

namespace App\Http\Controllers\User;

use App\User;
use App\CivilStatus;
use App\EducationLevel;
use App\EducationState;
use App\IdentificationType;
use App\EducationInformation;

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

    public function formations(Request $request)
    {
        $educationLevels = EducationLevel::all()->pluck('name', 'id');
        $educationStates = EducationState::all()->pluck('name', 'id');
        $formations = $this->user->cv->formations()
        ->with(['educationState', 'educationLevel'])->get();

        return response()->json([
            'data'  =>  $formations,
            'view'      =>  View('user.partials.cv.formations')
                            ->with('formations', $formations)
                            ->with('educationLevels',$educationLevels)
                            ->with('educationStates',$educationStates)
                            ->render()
        ]);
    }

    public function formationStore(Request $request)
    {
        $formation = new EducationInformation($request->all());
        $formation->curriculum_vitae_id = $this->user->cv->id;
        $formation->save();

        $formations = $this->user->cv->formations()->get();

        return response()->json([
            'result'    =>  true,
            'view'      =>  View('user.partials.cv.formations')
                            ->with('formations', $formations)
                            ->render()
        ]);
    }

    public function formationUpdate(Request $request, EducationInformation $formation)
    {
        $formation->fill($request->all());
        $formation->update();
        
        return response()->json([
            'data'  =>  $formation
        ]);
    }

    public function formationDestroy(Request $request, EducationInformation $formation)
    {
        $formation->delete();

        return response()->json([
            'result' => true  
        ]);
    }
}
