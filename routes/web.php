<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperController;
use JeroenNoten\LaravelAdminLte\AdminLte;
use App\Http\Controllers\GoogleController;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\CalonSantriController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
 Route::get('/home',[CalonSiswaController::class,'biodata'])->name('home');

//ROUTE UNTUK PENDAFTAR
Route::middleware('role:calonsiswa')->group(function () {
    Route::get('/registrasi_step1',function(){
        return view('calonsiswa.step1');
    })->name('step1');
    Route::post('/post_step1',[CalonSiswaController::class,'post_step1'])->name('post_step1');

    Route::get('/registrasi_step2',function(){
        return view('calonsiswa.step2');
    })->name('step2');
    Route::post('step2update',[CalonSiswaController::class,'update_step2'])->name('step2.update');

    Route::get('/registrasi_step3',function(){
        return view('calonsiswa.step3');
    })->name('step3');
    Route::post('step3update',[CalonSiswaController::class,'update_step3'])->name('step3.update');
    
    Route::get('/registrasi_step4',function(){
        return view('calonsiswa.step4');
    })->name('step4');
    Route::post('step4update',[CalonSiswaController::class,'update_step4'])->name('step4.update');
    Route::get('/selesai',function(){
        return view('calonsiswa.selesai');
    })->name('selesai');
    Route::get('keluar',[CalonSiswaController::class,'keluar'])->name('keluar');
    
});

// ROUTE UNTUK SUPER ADMIN
Route::middleware('role:super')->group(function () {
    route::prefix('super')->group(function(){
        route::get('/', function(){
            return view('super.home');
        })->name('super');
        route::get('db_setting',[SuperController::class,'getDbSetting'])->name('super.dbset');
        // route::get('dbset_edit/{id}',[SuperController::class,'dbSetEdit'])->name('super.dbset_edit');
        route::post('update_dbset/{id}',[SuperController::class,'updateDbSet'])->name('super.update_dbset');

        route::get('user_setting',[SuperController::class,'getUsers'])->name('super.users');
        route::delete('delete/{user}',[SuperController::class,'hapusUser'])->name('user.destroy');
    });
});

// ROUTE UNTUK ADMIN
Route::middleware('role:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', function(){
            return view('admin.home');
        })->name('admin');  
        // ----------------------------------------
        route::get('calonsiswa',[AdminController::class,'getCalonsiswa'])->name('data_calon_siswa');
        route::get('siswa_detail/{data}',[AdminController::class,'detailSiswa'])->name('siswa_detail');
        route::get('siswa_edit/{data}',[AdminController::class,'editSiswa'])->name('siswa_edit');
        route::put('siswa_update/{data}',[AdminController::class,'updateSiswa'])->name('update_siswa');
        route::get('terima/{data}',[AdminController::class,'terimaCalonsiswa'])->name('terima');
        Route::delete('siswa_hapus/{data}',[AdminController::class,'hapusSiswa'])->name('hapus_siswa');
        // ----------------------------------------
        route::get('siswa',[AdminController::class,'getSiswa'])->name('data_siswa');

        route::get('generatePDF',[AdminController::class,'generatePDF_siswa']);
        
        route::get('home',[AdminController::class,'home'])->name('admin_home');
        route::get('export_excel',[AdminController::class,'export_excel'])->name('export_excel');

        route::get('/siswa_per_kelas',[AdminController::class,'siswaPerkelas']);
        route::post('siswa_kelas',[AdminController::class,'siswaKelas'])->name('siswa_kelas');

        route::get('/siswa_per_tahun',[AdminController::class,'siswaPerTahun']);
        route::post('siswa_tahun',[AdminController::class,'siswaTahun'])->name('siswa_tahun');

        route::get('excel_siswa_kelas/{kelas}',[AdminController::class,'excelKelas'])->name('excel_siswa_kelas');
        route::get('excel_siswa_tahun/{tahun}',[AdminController::class,'excelTahun'])->name('excel_siswa_tahun');

        Route::get('seluruh_data',[AdminController::class,'seluruhSiswa'])->name('seluruh_siswa');
        Route::get('jk/{jk}',[AdminController::class,'getByJk'])->name('admin.get_by_jk');
    });
});

// ROUTE UNTUK CALONSISWA
Route::middleware('role:calonsiswa|siswa')->group(function () {
    Route::prefix('calonsiswa')->group(function () {
        // Route::get('/',[CalonSiswaController::class,'home'])->name('calonsiswa');
        Route::get('/', function(){
            return view('calonsiswa.home');
        })->name('calonsiswa'); 
        Route::get('/biodata',[CalonSiswaController::class,'biodata'])->name('siswa.biodata');
       
        Route::get('/cetak_data', function(){
            return view('calonsiswa.cetakdata');
        }); 
        Route::get('/hubungi_kami', function(){
            return view('calonsiswa.hubungi_kami');
        }); 
        route::get('generatePDF_mou/{id}',[AdminController::class,'generatePDF_mou'])->name('generatePDF_mou');
    });
});


Route::get('mou',function(){
    return view('admin.dokumen.mou');
});
 Route::get('/cetakbiodata/{id}',[AdminController::class,'generatePDF_biodata'])->name('cetakbiodata');
//  route::get('/generatePDF_mou/{id}',[AdminController::class,'generatePDF_mou'])->name('generatePDF_mou');

Route::get('/admin/coba_datatable', function () {
    return view('coba_datatable');
});

Route::get('editImage/{id}',[AdminController::class,'editImage'])->name('editimage');
Route::post('updateImage/{id}',[AdminController::class,'updateImage'])->name('updateImage');

Route::get('regflow',function(){
    return view('reg_flow.index');
});


//Login Google
Route::get('auth/google',[GoogleController::class,'redirectToGoogle'])->name('masuk.google');
Route::get('auth/google/callback',[GoogleController::class,'handleGoogleCallback']);

Route::get('auth/facebook',[FacebookController::class,'redirectToFacebook'])->name('masuk.facebook');
Route::get('auth/facebook/callback',[FacebookController::class,'handleFacebookCallback']);



// Route::get('auth/google/callback', function () {
 
//     // $user->token
// });