<?php

namespace App\Http\Controllers\Company;

use App\User;
use App\Address;
use App\Company;
use App\IdentificationType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = Auth::guard('company')->user()->users()->get();

        return view('company.partials.user.index')
        ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identificationTypes = IdentificationType::all()->pluck('name', 'id');

        return view('company.partials.user.create')
        ->with('identificationTypes', $identificationTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // Obtener la empresa autenticada+
        $company = Auth::guard('company')->user();

        // Validamos la información del formulario
        $this->validate($request,[
            'name'                      =>  'required',
            'last_name'                 =>  'required',
            'identification_type_id'    =>  'required',
            'identification_number'     =>  'required',
            'email'                     =>  'required',
        ]);

        // Creamos la dirección
        $address = new Address($request->all());
        $address->save();

        // Creamos a el usuario
        $user = new User($request->all());
        $user->password = bcrypt($request->identification_number);
        $user->address_id = $address->id;

        // Guardamons la relacion que hay entre la empresa y el usuario
        $company->users()->save($user);

        flash('Usuario creado con exito')->success();

        return redirect('/company/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $employee)
    {
        $identificationTypes = IdentificationType::all()->pluck('name', 'id');

        // $employee->address;
        // dd($employee);
        return view('company.partials.user.edit')
        ->with('user', $employee)
        ->with('identificationTypes',$identificationTypes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $employee)
    {
        $this->validate($request, [
            'name'                      =>  'required',
            'last_name'                 =>  'required',
            'identification_type_id'    =>  'required',
            'identification_number'     =>  'required|unique:users,identification_number,'.$employee->id,
            'email'                     =>  'required|unique:users,email,'.$employee->id,
        ]);

        // Rellenar el modelo con los nuevos datos
        $employee->fill($request->all());
        $employee->address->fill($request->all());
        $employee->update();
        $employee->address->update();

        // Mostramos el mensaje de actualización
        flash('El empleado ha sido actualizado con exito')->success();
        
        return redirect('/company/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        $employee->delete();

        flash("el usuario ha sido eliminado con exito")->success();

        return back();
    }
}
