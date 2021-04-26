<?php

namespace App\Http\Controllers;

use App\Helpers\Malik;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalonSiswaController extends Controller
{
   
    public function post_step1(Request $request)
    {
         $request->validate([
            'nama_lengkap'=>'required',
            'nik'=>'required',
            'kk'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
            'desa'=>'required',
            'kota'=>'required',
            // 'kode_pos'=>'required',
            'no_hp'=>'required',
            // 'hobi'=>'required',
            // 'cita_cita'=>'required',
        ]);
        // cek apakah data sudah ada di database
        $email = Auth::user()->email;
        $cek = Student::where('email',$email)->first();
        if($cek){
            echo 'Data Sudah ada';
        }else{
            $data = $request->all();
            $data['email']=$email;
            $data['role_id']=3;
            Student::create($data);

            return redirect()->route('step2');
        }
    }
    
    public function update_step2(Request $request)
    {
         $request->validate([
            'asal_sekolah'=>'required',
            // 'npsn_sekolah'=>'required',
            // 'alamat_sekolah_asal'=>'required',
            // 'no_un'=>'required',
            // 'no_seri_ijazah'=>'required',
            // 'no_skhun'=>'required',
            // 'prestasi'=>'required',
            // 'tingkat_prestasi'=>'required',
        ]);
        Student::where('email',Auth::user()->email)->update(
            [
            'asal_sekolah'=>$request->asal_sekolah,
            'npsn_sekolah'=>$request->npsn_sekolah,
            'alamat_sekolah_asal'=>$request->alamat_sekolah_asal,
            'no_un'=>$request->no_un,
            'no_seri_ijazah'=>$request->no_seri_ijazah,
            'no_skhun'=>$request->no_skhun,
            'prestasi'=>$request->prestasi,
            'tingkat_prestasi'=>$request->tingkat_prestasi,
            ]
        );

        return redirect()->route('step3');

    }
    public function update_step3(Request $request)
    {
         $request->validate([
            // 'status_keluarga'=>'required',
            // 'anak_ke'=>'required',
            'nama_ayah'=>'required',
            // 'nik_ayah'=>'required',
            // 'tempatlahir_ayah'=>'required',
            // 'tanggallahir_ayah'=>'required',
            // 'pendidikan_ayah'=>'required',
            // 'pekerjaan_ayah'=>'required',
            'nama_ibu'=>'required',
            // 'nik_ibu'=>'required',
            // 'tempatlahir_ibu'=>'required',
            // 'tanggallahir_ibu'=>'required',
            // 'pendidikan_ibu'=>'required',
            // 'pekerjaan_ibu'=>'required',
            // 'penghasilan'=>'required',
        ]);
        Student::where('email',Auth::user()->email)->update(
            [
                'status_keluarga'=>$request->status_keluarga,
                'anak_ke'=>$request->anak_ke,
                'nama_ayah'=>$request->nama_ayah,
                'nik_ayah'=>$request->nik_ayah,
                'tempatlahir_ayah'=>$request->tempatlahir_ayah,
                'tanggallahir_ayah'=>$request->tanggallahir_ayah,
                'pendidikan_ayah'=>$request->pendidikan_ayah,
                'pekerjaan_ayah'=>$request->pekerjaan_ayah,
                'nama_ibu'=>$request->nama_ibu,
                'nik_ibu'=>$request->nik_ibu,
                'tempatlahir_ibu'=>$request->tempatlahir_ibu,
                'tanggallahir_ibu'=>$request->tanggallahir_ibu,
                'pendidikan_ibu'=>$request->pendidikan_ibu,
                'pekerjaan_ibu'=>$request->pekerjaan_ibu,
                'penghasilan'=>$request->penghasilan,
            ]
        );

        return redirect()->route('step4');

    }
    public function update_step4(Request $request)
    {
         $request->validate([
            // 'no_pkh'=>'required',
            // 'no_kks_kps'=>'required',
            // 'no_kip'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:600',
            'image_ortu' => 'image|mimes:jpeg,png,jpg|max:600',
        ]);
        //Jika foto siswa tidak kosong, maka
        if ($request->image) {
            $destinationPath = 'Foto/Siswa/'; // upload path
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move($destinationPath, $imageName);
        }else{
            $imageName = '';
        }
        //Jika foto ortu tidak kosong, maka
        if ($request->image_ortu) {
            $destinationPath = 'Foto/Ortu/'; // upload path
            $imageNameAyah = time().'.'.$request->image->getClientOriginalExtension();
            $request->image_ortu->move($destinationPath,  $imageNameAyah);
            // $request->image->storeAs('images', $imageName);
        }else{
            $imageNameAyah='';
        }

        Student::where('email', Auth::user()->email)->update(
            [
                'no_pkh'=>$request->no_pkh,
                'no_kks_kps'=>$request->no_kks_kps,
                'no_kip'=>$request->no_kip,
                'foto_siswa'=>$imageName,
                'foto_ortu'=>$imageNameAyah,
            ]
        );

        return redirect()->route('selesai');

    }
    public function keluar(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
    public function home()
    {
        return view('calonsiswa.home');
    }
    function biodata()
    {
        $email = Auth::user()->email;
        $data = Student::where('email',$email)->first();
        try{
            $role = (int)Malik::cekRoleId();
        }catch (\Throwable $th) {
            //throw $th;
            $role = 3; 
        }
        
        $title = 'Konfirmasi data';
        if($data){
            return view('admin.detail_siswa',compact('data','role','title'));
        }else{
            return redirect()->route('step1');
        }
    }
}
