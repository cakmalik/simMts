<?php

namespace App\Http\Controllers;

use Svg\Tag\Rect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuperController extends Controller
{
    public function getDbSetting()
    {
        $data = DB::table('database_settings')->get();
        return view('super.db_setting',compact('data'));
    }
    
    function updateDbSet(Request $request, $id)
    {
        DB::table('database_settings')->where('id',$id)->update(['value'=>$request->value]);
        return redirect()->route('super.dbset');
    }
    public function getUsers()
    {
        $id = Auth::user()->id;
        $data = User::whereNotIn('id', [1,2])->get();
        return view('super.users',compact('data'));
    }
    public function hapusUser(User $user)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $user->delete();
        return redirect()->route('super.users');
    }

    public function editUser($id)
    {
        $data = User::find($id);
        return view('super.edituser',compact('data'));
    }

    public function updateuser(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);

        if ($request->password==null) {
            User::where('id', $id)->update(
                [
                'name'=>$request->name,
                'email'=>$request->email
            ]
            );
        }else{
            User::where('id', $id)->update(
                [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]
            );
        }
    }
}
