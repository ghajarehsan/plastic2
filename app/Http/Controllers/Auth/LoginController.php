<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {

        Auth::logout();

        session()->forget('notverifiedyet');

        return redirect()->route('home');

    }

    public function login(Request $request)
    {

        //validate

        $this->validateLogin($request);


        $user = Auth::attempt($request->only('email', 'password'));

        if ($user == true) {

            return redirect()->route('home');

        } else {

           return redirect()->route('registerform')->with('error', true);

        }

    }

    protected function validateLogin(Request $request)
    {
        $request->validate([

            'email' => 'required|string',

            'password' => 'required|string',
        ]);
    }


}
