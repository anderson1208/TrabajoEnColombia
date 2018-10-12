<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Gender;
use App\AreaWork;
use App\CivilStatus;
use App\EducationLevel;
use App\EducationState;
use App\WorkExperience;
use App\IdentificationType;
use App\EducationInformation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        // return response()->json($this->user->employmentPreference->areasWork()->get()->pluck('id'));
    	$identificationTypes = IdentificationType::all()->pluck('name', 'id');
        $educationLevels = EducationLevel::all()->pluck('name', 'id');
        $educationStates = EducationState::all()->pluck('name', 'id');
    	$civilStatuses = CivilStatus::all()->pluck('name', 'id');
        $genders = Gender::all()->pluck('name', 'id');
        $areasWork = AreaWork::all()->pluck('name', 'id');

    	return view('user.partials.cv.index')
    	->with('user',$this->user)
        ->with('genders',$genders)
        ->with('civilStatuses', $civilStatuses)
        ->with('educationLevels',$educationLevels)
        ->with('educationStates',$educationStates)
    	->with('identificationTypes',$identificationTypes)
        ->with('areasWork', $areasWork);
    }

    public function updatePersonalInfo(Request $request)
    {
        $this->user->fill($request->all());
        $this->user->update();

        return response()->json([
            'result'    =>  true,
            'data'      =>  $this->user
        ]);
    }

    public function updateAddress(Request $request)
    {
        $address = $this->user->address;
        $address->fill($request->all());
        $address->update();

        return response()->json([
            'result'    =>  true,
            'data'      =>  $address
        ]);
    }

    public function updateProfessionalProfile(Request $request)
    {
        $cv = $this->user->cv;
        $cv->fill($request->all());
        $cv->update();

        return response()->json([
            'result'    =>  true,
            'data'      =>  $cv
        ]);
    }

    public function uploadImage(Request $request)
    {

        $this->validate($request,[
            'avatar'    =>  'required|mimes:jpeg,jpg,png'
        ]);

        if($request->file('avatar'))
        {
            if($this->user->avatar)
                Storage::disk('public')->delete($this->user->avatar);

            $path = Storage::disk('public')->put('image', $request->file('avatar'));
            $this->user->avatar = $path;
            $this->user->update();

            return response()->json([
                'avatar' => $path
            ]);
        }

        return response()->json([
            'error' => true,
            'msg'   => 'Lo sentimos ha ocurrido un error'
        ], 500);
    }

    public function updateEmploymentPreference(Request $request)
    {

        $employmentPreference = $this->user->employmentPreference;
        $employmentPreference->fill($request->all());
        $employmentPreference->update();
        
        $employmentPreference->areasWork()->sync($request->areas);

        return response()->json([
            'result' => true
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
