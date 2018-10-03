<?php

namespace App\Http\Controllers\Company;

use App\Vacant;
use App\WorkingDay;
use App\ContractType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VacantController extends Controller
{

    protected $company;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
        
        $this->company = Auth::guard('company')->user();

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
        $vacants = $this->company->vacants()->get();

        return view('company.partials.vacant.index')
        ->with('vacants', $vacants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contractTypes = ContractType::all()->pluck('name', 'id');
        $workingDay = WorkingDay::all()->pluck('name', 'id');
        
        return view('company.partials.vacant.create')
        ->with('contractTypes', $contractTypes)
        ->with('workingDay', $workingDay);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'         =>  'required',
            'description'   =>  'required',
            'expired_date'  =>  'required'
        ]);

        $vacant = new Vacant($request->all());
        $vacant->company_id = $this->company->id;
        $vacant->save();

        flash('Se ha creado la vacante con exito')->success();

        return redirect('company/vacant');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacant  $vacant
     * @return \Illuminate\Http\Response
     */
    public function show(Vacant $vacant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacant  $vacant
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacant $vacant)
    {
        $contractTypes = ContractType::all()->pluck('name', 'id');
        $workingDay = WorkingDay::all()->pluck('name', 'id');

        return view('company.partials.vacant.edit')
        ->with('vacant', $vacant)
        ->with('contractTypes', $contractTypes)
        ->with('workingDay', $workingDay);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacant  $vacant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacant $vacant)
    {
        $vacant->fill($request->all());
        $vacant->update();

        flash('La vacante se ha actualizado con exito')->success();

        return redirect('company/vacant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacant  $vacant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacant $vacant)
    {
        $vacant->delete();

        flash('Se ha eliminado la vacante')->success();

        return redirect('company/vacant');
    }
}
