<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // arahkan role masing2 disini
        $id_user = Auth::user()->id;
        $cekkode = DB::table('model_has_roles')->where('model_id',$id_user)->first();

        if($cekkode->role_id==1){
            return view('super.home');
        }elseif($cekkode->role_id==2){
            return view('admin.home');
        }elseif($cekkode->role_id==3){
            return view('calonsiswa.home');
        }elseif($cekkode->role_id==4){
            return view('calonsiswa.home');
        }elseif($cekkode->role_id==5){
            return view('alumni.home');
        }else{
            return view('home');
        }
        return view('home');
    }
}
