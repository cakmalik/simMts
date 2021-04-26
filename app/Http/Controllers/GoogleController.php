<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\RegistersUsers;


class GoogleController extends Controller
{
    use RegistersUsers;

   public function redirectToGoogle()
    {
        return Socialite::driver('google')
        ->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id',$user->getId())->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('home');
            }else{
                $newuser= User::create([
                    'name'=>$user->getName(),
                    'username'=>$user->getEmail(),
                    'email'=>$user->getEmail(),
                    'google_id'=>$user->getId(),
                    'password'=>bcrypt(12345678),
                    'role_id'=>3
                ]);
                $newuser->assignRole('calonsiswa');
                Auth::login($newuser);
                return redirect()->intended('step1');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
