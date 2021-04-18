<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
  
    public function run()
    {
        DB::table('menus')->insert([
            [
                'name'=>'Home',
                'url'=>'/super',
                'icon'=>'fas fa-home',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'1',
                'role_id'=>'1',
            ],
            [
                'name'=>'Database setting',
                'url'=>'/super/db_setting',
                'icon'=>'fas fa-database',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'2',
                'role_id'=>'1',
            ],
            [
                'name'=>'System setting',
                'url'=>'/super/system_setting',
                'icon'=>'fas fa-cog',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'2',
                'role_id'=>'1',
            ],
            [
                'name'=>'User setting',
                'url'=>'/super/user_setting',
                'icon'=>'fas fa-user-cog',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'3',
                'role_id'=>'1',
            ],
            // ADMIN
            [

                'name'=>'Home',
                'url'=>'/admin',
                'icon'=>'fas fa-fw fa-home',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'1',
                'role_id'=>'2',
            ],
            [
                'name'=>'Calon Siswa',
                'url'=>'/admin/calonsiswa',
                'icon'=>'fas fa-fw fa-user-plus',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'2',
                'role_id'=>'2',
            ],
            [
                'name'=>'Seluruh Siswa',
                'url'=>'/admin/seluruh_data',
                'icon'=>'fas fa-fw fa-users',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'3',
                'role_id'=>'2',
            ],
            [
                'name'=>'Data tiap kelas',
                'url'=>'/admin/siswa_per_kelas',
                'icon'=>'fas fa-fw fa-user-friends',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'4',
                'role_id'=>'2',
            ],
            [
                'name'=>'Data tiap tahun',
                'url'=>'/admin/siswa_per_tahun',
                'icon'=>'fas fa-fw fa-user-friends',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'4',
                'role_id'=>'2',
            ],
            
            //CALON SISWA
            [
                'name'=>'Beranda',
                'url'=>'/calonsiswa',
                'icon'=>'fas fa-fw fa-home',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'1',
                'role_id'=>'3',
            ],
            // [
            //     'name'=>'Alur pendaftaran',
            //     'url'=>'/calonsiswa/alur_pendaftaran',
            //     'icon'=>'fas fa-fw fa-step-forward',
            //     'icon_color'=>'text-success',
            //     'is_active'=>'1',
            //     'order'=>'1',
            //     'role_id'=>'3',
            // ],
            [
                'name'=>'Data Siswa',
                'url'=>'/calonsiswa/biodata',
                'icon'=>'fas fa-fw fa-user',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'1',
                'role_id'=>'3',
            ],
            [
                'name'=>'Cetak data',
                'url'=>'/calonsiswa/cetak_data',
                'icon'=>'fas fa-fw fa-print',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'1',
                'role_id'=>'3',
            ],
            [
                'name'=>'Hubungi kami',
                'url'=>'/calonsiswa/hubungi_kami',
                'icon'=>'fas fa-fw fa-phone-alt',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'1',
                'role_id'=>'3',
            ],
            // SISWA
            [
                'name'=>'Beranda',
                'url'=>'/calonsiswa',
                'icon'=>'fas fa-fw fa-home',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'1',
                'role_id'=>'4',
            ],
            // [
            //     'name'=>'Alur pendaftaran',
            //     'url'=>'/calonsiswa/alur_pendaftaran',
            //     'icon'=>'fas fa-fw fa-step-forward',
            //     'icon_color'=>'text-success',
            //     'is_active'=>'1',
            //     'order'=>'1',
            //     'role_id'=>'4',
            // ],
            [
                'name'=>'Data Siswa',
                'url'=>'/calonsiswa/biodata',
                'icon'=>'fas fa-fw fa-user',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'1',
                'role_id'=>'4',
            ],
            [
                'name'=>'Cetak data',
                'url'=>'/calonsiswa/cetak_data',
                'icon'=>'fas fa-fw fa-print',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'1',
                'role_id'=>'4',
            ],
            [
                'name'=>'Hubungi kami',
                'url'=>'/calonsiswa/hubungi_kami',
                'icon'=>'fas fa-fw fa-phone-alt',
                'icon_color'=>'text-success',
                'is_active'=>'1',
                'order'=>'1',
                'role_id'=>'4',
            ],
        ]);
    }
}
