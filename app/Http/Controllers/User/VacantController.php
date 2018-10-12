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
        // Obtenemos las area selececioandas en las preferencias de empleo
        $ep = $this->user->employmentPreference->areasWork()->get()->pluck('id');

        // Obtenemos todas las aplicaciones
        $myApplications = $this->user->vacants()->get()->pluck('id');

        // Filtramos las vacantes relacionadas a las areas de preferencias de empleo seleccionadas
        $vacants = Vacant::whereIn('area_work_id', $ep)->get();

        // Descartamos las vacantes ya aplicadas
        $vacants = $vacants->whereNotIn('id', $myApplications);

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
        // Guardamos la aplicacion del usuario a la vacante
        $this->user->vacants()->attach($request->vacant_id, ['vacant_state_id' => 1]);

        return response()->json([
            'data'  =>  $this->user->vacants
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
        // buscamos si el usuario ya aplico a la vacante
        $myApplications = $this->user->vacants()
        ->where('vacant_id', $vacant->id)
        ->get();

        /** 
            Si el resultado es mayor a 0 es por que ya aplico ha esta vacanto y sera redireccionado a la vista
            comparativa
        */
        if(count($myApplications) > 0)
            return redirect("/user/vacants/{$vacant->id}/process");

        return view('user.partials.vacants.show')
        ->with('vacant', $vacant);
    }

    public function process(Vacant $vacant)
    {
        dd("ha sido redireccionado :P");
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
