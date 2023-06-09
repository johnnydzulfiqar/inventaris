<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.index');
            } else if (auth()->user()->type == 'kepala') {
                return redirect()->route('dashboard2.index');
            } else if (auth()->user()->type == 'user') {
                return redirect()->route('dashboard.index');
            } else if (auth()->user()->type == 'guru') {
                return redirect()->route('guru.index');
            } else {
                return redirect()->route('login');
            }
        } else {
            return back()->withErrors([
                'email' => 'Email atau Password Salah.',
                'password' => 'Email atau Password Salah.',

            ])->onlyInput('email', 'password');
        }
    }
}
