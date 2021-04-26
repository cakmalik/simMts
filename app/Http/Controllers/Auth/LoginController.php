<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
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

    //INI UNTUK OVERIDE FUNCTION YANG ADA DI DALAM TREAT AUTENTICATESUSERS
    protected function authenticated(Request $request, $user)
    {
        if($user->hasRole('admin')){
            return redirect()->route('admin');
        }elseif($user->hasRole('calonsiswa')){
            return redirect()->route('siswa.biodata');
        }elseif($user->hasRole('super')){
            return redirect()->route('super');
        }elseif($user->hasRole('siswa')){
            return redirect()->route('calonsiswa');
        }elseif($user->hasRole('alumni')){
            return redirect()->route('alumni');
        }
        return redirect()->route('home');
    }

   
    

    
}
