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

    //pelajaran berharga dari error ini berkali kali malik, bahwa (stateless) = Setiap kali kita ingin mengakses program ini maka kita harus mengirim informasi username 

    //sedangkan (statefull) tidak demikian, ia hanya menyimpan sekali dan menggunakan session untuk masuk lagi. tanpa perlu mengirim informasi username lagi 


    public function redirectToGoogle()
    {
       return Socialite::driver('google')
            ->stateless()
            ->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
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
                return redirect()->route('step1');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
