<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\RegistersUsers;

class FacebookController extends Controller
{
    use RegistersUsers;

   public function redirectToFacebook()
    {
        return Socialite::driver('facebook')
        ->redirect();
    }
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id',$user->getId())->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('home');
            }else{
                $newuser= User::create([
                    'name'=>$user->getName(),
                    'username'=>$user->getEmail(),
                    'email'=>$user->getEmail(),
                    'facebook_id'=>$user->getId(),
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
