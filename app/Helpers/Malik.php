<?php
namespace App\Helpers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\DatabaseSetting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
 
class Malik {
    public static function get_username($user_id) {
        $user = DB::table('users')->where('userid', $user_id)->first();
        return (isset($user->username) ? $user->username : '');
    }
    public static function setKelasPutra()
    {
        //ambil setting kuota tiap kelas
        $maksimal_kuota_kelas = DatabaseSetting::where('name','kuota_kelas')->first();
        //cek apakah kelas siswa ambil Kode ABC terbaru
        $cekkelas = Student::where([
            
            'jenis_kelamin'=>'Laki-laki',
            ])->orderBy('kelas','desc')->first();

        //Jika data kosong, maka buat ke 7A
        if(!$cekkelas->kelas){
            $setkelas = '7A';
        //Jika ada isinya, maka
        }else{
            //cek jumlah siswanya yang kode terbaru
            $cekkuota = Student::where([
                'kelas'=>$cekkelas->kelas,
                'jenis_kelamin'=>'Laki-laki'
            ])->count();
            $maksimal_kuota_kelas = (int)$maksimal_kuota_kelas->value;
            // dd($maksimal_kuota_kelas);

            // jika kuota lebih kecil daripada yang diharapkan, maka gunakan kode tersebut lg
            if($cekkuota < $maksimal_kuota_kelas){
                $setkelas = $cekkelas->kelas;
            //jika lebih besar dr diharapkan (30), maka ambil kode baru setelahnya
            }else{
                $id = Grade::where('name',$cekkelas->kelas)->first();
                $kelasnow = Grade::where('id',$id->id+1)->first();
                $setkelas = $kelasnow->name;
            }
        }
        return $setkelas;

    }
    public static function setKelasPutri()
    {
        //ambil setting kuota tiap kelas
        $maksimal_kuota_kelas = DatabaseSetting::where('name','kuota_kelas')->first();
        //cek apakah kelas siswa ambil Kode ABC terbaru
        $cekkelas = Student::where([
        
            'jenis_kelamin'=>'Perempuan',
            ])->orderBy('kelas','desc')->first();

        //Jika data kosong, maka buat ke 7i
       if(!$cekkelas->kelas){
            $setkelas = '7I';
        //Jika ada isinya, maka
        }else{
            //cek jumlah siswanya yang kode terbaru
            $cekkuota = Student::where([
                'kelas'=>$cekkelas->kelas,
                'jenis_kelamin'=>'Perempuan'
                ])->count();
            $maksimal_kuota_kelas = (int)$maksimal_kuota_kelas->value;
            // dd($maksimal_kuota_kelas);

            // jika kuota lebih kecil daripada yang diharapkan, maka gunakan kode tersebut lg
            if($cekkuota < $maksimal_kuota_kelas){
                $setkelas = $cekkelas->kelas;
            //jika lebih besar dr diharapkan (30), maka ambil kode baru setelahnya
            }else{
                $id = Grade::where('name',$cekkelas->kelas)->first();
                $kelasnow = Grade::where('id',$id->id+1)->first();
                $setkelas = $kelasnow->name;
            }
        }
        return $setkelas;

    }
    public static function setKelasCampur()
    {
        //ambil setting kuota tiap kelas
        $maksimal_kuota_kelas = DatabaseSetting::where('name','kuota_kelas')->first();
        //cek apakah kelas siswa ambil Kode ABC terbaru
        $cekkelas = Student::orderBy('kelas','desc')->first();

        //Jika data kosong, maka buat ke 7A
       if(!$cekkelas->kelas){
            $setkelas = '7A';
        //Jika ada isinya, maka
        }else{
            //cek jumlah siswanya yang kode terbaru
            $cekkuota = Student::where('kelas', $cekkelas->kelas)->count();
            $maksimal_kuota_kelas = (int)$maksimal_kuota_kelas->value;

            // jika kuota lebih kecil daripada yang diharapkan, maka gunakan kode tersebut lg
            if($cekkuota < $maksimal_kuota_kelas){
                $setkelas = $cekkelas->kelas;
            //jika lebih besar dr diharapkan (30), maka ambil kode baru setelahnya
            }else{
                $id = Grade::where('name',$cekkelas->kelas)->first();
                $kelasnow = Grade::where('id',$id->id+1)->first();
                $setkelas = $kelasnow->name;
            }
        }
        return $setkelas;

    }
    
    public static function nis()
    {
        $nis_start_from = DatabaseSetting::where('name','nis_start_from')->first()->value;
        $thn = date('y');
        $nsm = DatabaseSetting::where('name','nsm')->first()->value;
        $latestNis= Student::orderBy('nis','desc')->first();

        if($latestNis->nis){
            $pecah_nis = explode(" ", $latestNis->nis);
            //mencari element array 0
            $hasil = $pecah_nis[2];
            //tampilkan hasil pemecahan
            $no_urut_berikutnya = $hasil+1;
            $nis = $nsm.' '.$thn.' '.$no_urut_berikutnya;
        }else{
            $nis = $nsm.' '.$thn.' '.$nis_start_from;
        }
        return $nis;
    }
    
    public static function cekRoleId()
    {
        $email = Auth::user()->email;
        $cekrole = Student::where('email',$email)->first()->role_id;
        return $cekrole;
    }
}
