<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Vacant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VacantController extends Controller
{

    protected $user;

    function __construct()
    {
        $this->middleware(function($request, $next){

            $this->user = Auth::user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function related()
    {
        $ep = $this->user->employmentPreference->areasWork()->get()->pluck('id');
        $vacants = Vacant::whereIn('area_work_id', $ep)->get();

        return response()->json([
            'view'  => View('user.partials.home.vacantsRelatedMyProfile')
            ->with('vacants', $vacants)
            ->render()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json([
            'data'  =>  $request->all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Vacant $vacant)
    {
        return view('user.partials.vacants.show')
        ->with('vacant', $vacant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacant $vacant)
    {
        //
    }
}
