<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Grade;
use App\Helpers\Malik;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Exports\{SiswaExport,TahunExport,KelasExport};
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Providers\MalikServiceProvider;
use PHPUnit\Framework\MockObject\Builder\Stub;

class AdminController extends Controller
{
     protected function getActionColumnCalonsiswa($data): string
    {
        $accUrl = route('terima', $data->id);
        $showUrl = route('siswa_detail', $data->id);
        $editUrl = route('siswa_edit', $data->id);
        $pdfMouUrl = route('generatePDF_mou', $data->id);
        $bioUrl = route('cetakbiodata', $data->id);
        $ktsUrl = '#';
        return "
        <a class='btn btn-sm btn-success' data-toggle='tooltip' data-placement='top' title='Terima' data-value='$data->id' href='$accUrl'><i class='fas fa-check'></i></a> 
        <a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='top' title='Cetak Biodata' data-value='$data->id' href='$bioUrl'><i class='fas fa-print'></i></a> 
        <a class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='top' title='Cetak MoU' data-value='$data->id' href='$pdfMouUrl'><i class='fas fa-print'></i></a> 
        <a class='btn btn-sm btn-warning' data-value='$data->id' href='$showUrl'><i class='fas fa-search-plus'></i></a> 
        <a class='btn btn-sm btn-warning' data-value='$data->id' href='$editUrl'><i class='fas fa-edit'></i></a>
        ";
    }
     protected function getActionColumnSiswa($data): string
    {
        $accUrl = route('terima', $data->id);
        $showUrl = route('siswa_detail', $data->id);
        $editUrl = route('siswa_edit', $data->id);
        return "
        <a class='btn btn-sm btn-warning' data-value='$data->id' href='$showUrl'><i class='fas fa-search-plus'></i></a> 
        <a class='btn btn-sm btn-warning' data-value='$data->id' href='$editUrl'><i class='fas fa-edit'></i></a>";
    }

    function getCalonsiswa(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::where('role_id',3)->get();
   
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->filter(function ($instance) use ($request) {

                        if (!empty($request->get('search'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                if (Str::contains(Str::lower($row['kota']), Str::lower($request->get('search')))) {
                                    return true;
                                } elseif (Str::contains(Str::lower($row['nama_lengkap']), Str::lower($request->get('search')))) {
                                    return true;
                                }
   
                                return false;
                            });
                        }
                    })
                    ->addColumn('action',function ($data){
                         return $this->getActionColumnCalonsiswa($data);
                    })      
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.data_calonsiswa');
    }
   
    function terimaCalonsiswa($id)
    {
         // INI PENENTUAN NIS
        $nis= Malik::nis();
        
        $jk = Student::where('id',$id)->first()->jenis_kelamin;

        //INI PENENTUAN KELAS
        if ($jk=='Perempuan') {
            $kelas = Malik::setKelasPutri();
        }else{
            $kelas = Malik::setKelasPutra();
        }

        //Ubah role_id di table students
        Student::where('id',$id)->update(
            [
                'role_id'=>4,
                'nis'=>$nis,
                'kelas'=>$kelas
            ]
        );

        //Cari dulu emailnya
        $email=Student::where('id',$id)->first()->email;
        $idUser = User::where('email',$email)->first();

        //Ubah role_id di tabel model_has_role
        if ($idUser) {
            DB::table('model_has_roles')->where('model_id', $idUser->id)->update(['role_id'=>4]);
            alert()->success('Telah diterima menjadi siswa/i', 'Berhasil !');
            return back();
        }else{
            alert()->error('Akun siswa tidak ditemukan', 'Gagal !');
            return back();
        }
    }
    function getSiswa(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::where('role_id',4)->get();
   
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->filter(function ($instance) use ($request) {

                        if (!empty($request->get('search'))) {
                            $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                                if (Str::contains(Str::lower($row['kota']), Str::lower($request->get('search')))) {
                                    return true;
                                } elseif (Str::contains(Str::lower($row['nama_lengkap']), Str::lower($request->get('search')))) {
                                    return true;
                                }
   
                                return false;
                            });
                        }
                    })
                    ->addColumn('action',function ($data){
                         return $this->getActionColumnSiswa($data);
                    })      
                    ->rawColumns(['action'])
                    ->make(true);
        }
    
        return view('admin.data_siswa');
    }
    function detailSiswa($id)
    {
        $data = Student::where('id',$id)->first();
        return view('admin.detail_siswa',compact('data'));
    }
    function editSiswa($id)
    {
        $student = Student::find($id);
        return view('admin.edit_siswa',compact('student'));
    }
    function editImage($id)
    {
        $data = Student::find($id);
        return view('admin.editImage')->with('data',$data);
    }
    function updateSiswa(Request $request, $id)
    {
        Student::find($id)->update($request->all());
        alert()->success('Edit data siswa/i', 'Berhasil !');
        return back();
    }
    function updateImage(Request $request, $id)
    {
        $role = Auth::user()->name;
        $request->validate([
            // 'no_pkh'=>'required',
            // 'no_kks_kps'=>'required',
            // 'no_kip'=>'required',
            'foto_siswa' => 'image|mimes:jpeg,png,jpg|max:600',
            'foto_ortu' => 'image|mimes:jpeg,png,jpg|max:600',
        ]);
        $student = Student::find($id);
        if($request->file('foto_siswa')){
            $file_siswa=$request->file('foto_siswa');
            $extension_siswa=$file_siswa->getClientOriginalExtension();
            $filename = $student->nik.'.'.$extension_siswa;
            $file_siswa->move('Foto/Siswa/',$filename);
            $student->foto_siswa=$filename;
        }
        if($request->file('foto_ortu')){
            $file_ayah=$request->file('foto_ortu');
            $extension=$file_ayah->getClientOriginalExtension();
            $filename_ayah = $student->nik_ayah.'.'.$extension;
            $file_ayah->move('Foto/Ortu/',$filename_ayah);
            $student->foto_ortu=$filename_ayah;
        }
        $student->save();
        alert()->success('Update foto', 'Berhasil !');
        if($role=='Admin'){
            return redirect()->route('siswa_detail',$id);
        }else{
            return redirect()->route('siswa.biodata',$id);
        }
    }
    function hapusSiswa($id)
    {
        Student::find($id)->delete();
        alert()->success('Siswa dihapus', 'Berhasil !');
        return redirect()->route('admin_home');
    }
    
    public function generatePDF_siswa()
    {
        $pdf = PDF::loadView('admin.myPDF');
        return $pdf->download('laporan-pdf.pdf');
    }
    public function generatePDF_mou($id)
    {
        $data = Student::where('id',$id)->first();
        $pdf = PDF::loadView('admin.dokumen.mou',$data);
        // return $pdf->download('mou-siswa.pdf');
        return $pdf->stream();
    }
    public function generatePDF_biodata($id)
    {
        $data = Student::where('id',$id)->first();
        // $pdf = PDF::loadView('admin.dokumen.biodata',$data)->setPaper([0, 0, 685.98, 396.85], 'potrait');;
        //cek role, jika role 3 maka title = BUKTI FORMULIR PENDAFTARAN
        //Jika role 4 maka title = BUKTI VERIFIKASI SISWA
        if($data->role_id==3){
            $data['title']="BUKTI FORMULIR PENDAFTARAN";
        }else{
            $data['title']="BUKTI VERIFIKASI SISWA";
        }
        if($data->foto_siswa==null){
            $data['foto_siswa']='default.jpg';
        }
        
        $pdf = PDF::loadView('admin.dokumen.biodata',$data);
        return $pdf->stream();
    }
    function home()
    {
         return view('admin.home');
    }
    function export_excel()
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function siswaPerkelas()
    {
        $data = Student::where('kelas','7A')->get();
        $kelas = 'Kelas 7A';
       return view('admin.siswa_per_kelas',compact('data','kelas'));
    }
    public function siswaKelas(Request $request)
    {
        $kelas =$request->kelas;
        $data = Student::where('kelas', $request->kelas)->paginate(100);
        return view('admin.siswa_per_kelas',compact('data','kelas'));
    }
    public function siswaPerTahun()
    {
        $data = Student::where('role_id',4)->whereYear('created_at', '=', date('Y'))->get();
        $tahun = 'Tahun '.date('Y');
       return view('admin.siswa_per_tahun',compact('data','tahun'));
    }
    public function siswaTahun(Request $request)
    {
        $tahun =$request->tahun;
        $data = Student::where('role_id',4)->whereYear('created_at', '=', $tahun)->get();
        return view('admin.siswa_per_tahun',compact('data','tahun'));
    }
    function excelKelas($kelas)
    {
        return Excel::download(new KelasExport($kelas), 'siswa.xlsx');
    }
    function excelTahun($tahun)
    {
        return Excel::download(new TahunExport($tahun), 'siswa.xlsx');
    }
    function cetakKts($id)
    {
        $data = Student::find($id);
        return view('admin.dokumen.kts',compact('data'));
    }
    function seluruhSiswa()
    {
        $data = Student::where('role_id', 4)->get();
        return view('admin.seluruh_siswa',compact('data'));
    }
    public function getByJk($jk)
    {
        // dd($jk);
        $data = Student::where(['jenis_kelamin'=>$jk,'role_id'=>4])->get();
        return view('admin.seluruh_siswa',compact('data'));
    }
}

