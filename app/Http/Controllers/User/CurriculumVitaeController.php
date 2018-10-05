<?php

namespace App\Http\Controllers\User;

use App\User;
use App\CivilStatus;
use App\EducationLevel;
use App\EducationState;
use App\IdentificationType;
use App\EducationInformation;
use App\WorkExperience;

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

    public function updatePersonalInfo(Request $request, User $user)
    {
        $user->fill($request->all());
        $user->update();

        return response()->json([
            'result'    =>  true,
            'data'      =>  $user
        ]);
    }

    public function formations(Request $request)
    {
        $educationLevels = EducationLevel::all()->pluck('name', 'id');
        $educationStates = EducationState::all()->pluck('name', 'id');
        $formations = $this->user->cv->formations()
        ->with(['educationState', 'educationLevel'])->get();

        return response()->json([
            'data'  =>  $formations,
            'view'      =>  View('user.partials.cv.formations.index')
                            ->with('formations', $formations)
                            ->with('educationLevels',$educationLevels)
                            ->with('educationStates',$educationStates)
                            ->render()
        ]);
    }

    public function workExperiences(Request $request)
    {
        $wExperiences = $this->user->cv->workExperiences()->get();

        return response()->json([
            'view'      =>  View('user.partials.cv.workExperience.index')
                            ->with('wExperiences', $wExperiences)
                            ->render()
        ]);
    }

    public function formationStore(Request $request)
    {
        $formation = new EducationInformation($request->all());
        $formation->curriculum_vitae_id = $this->user->cv->id;
        $formation->save();

        return response()->json([
            'result'    =>  true,
        ]);
    }

    public function workExperienceStore(Request $request)
    {
        $workExperience = new WorkExperience($request->all());
        $workExperience->curriculum_vitae_id = $this->user->cv->id;
        $workExperience->save();

        return response()->json([
            'result'    =>  true,
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
    public function workExperienceUpdate(Request $request, WorkExperience $workExperience)
    {
        $workExperience->fill($request->all());
        $workExperience->update();

        return response()->json([
            'data'  =>  $workExperience
        ]);
    }

    public function formationDestroy(Request $request, EducationInformation $formation)
    {
        $formation->delete();

        return response()->json([
            'result' => true  
        ]);
    }

    public function workExperienceDestroy(Request $request, WorkExperience $workExperience)
    {
        $workExperience->delete();

        return response()->json([
            'result' => true  
        ]);
    }
}
