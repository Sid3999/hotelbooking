<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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
    protected $redirectTo = '/home';

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        // $userRoles = Auth::user()->roles->pluck('name');
        
        $userRoles = Auth::user()->roles->pluck('id');
        // dd($userRoles);
        if($user->is_active == 0){
            Auth::logout();
            return redirect('/login')->withErrors(['email' => 'Your account is suspended. Please contact admin .']);
        }
        if ($userRoles->contains(1)) {
            $this->redirectTo = '/dashboard';
        }
        elseif($userRoles->contains(2)){
            $this->redirectTo = '/booking-dashboard';
        } else {
            $this->redirectTo = '/home';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}