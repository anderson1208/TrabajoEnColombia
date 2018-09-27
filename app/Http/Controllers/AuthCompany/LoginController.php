<?php

namespace App\Http\Controllers\AuthCompany;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/company';

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('company.auth.login');
    }

    public function login(Request $request)
    {
    	// Validamos los campos que vienen desde el formulario
    	$this->validator($request);

    	// Iniciamos sesion
    	if($this->attempLogin($request))
    		return redirect($this->redirectTo);

    	return $this->sendFailedLoginResponse($request);
    }

    public function validator(Request $request)
    {
    	$this->validate($request, [
    		'email'	=>	'required|email',
    		'password'	=>	'required'
    	]);
    }

    public function attempLogin(Request $request)
    {
    	$credentials = $request->only('email', 'password');

    	return $this->guard()->attempt($credentials);
    }


    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }


    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return  Auth::guard('company');
    }
}
