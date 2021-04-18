<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSettingSeeder extends Seeder
{

    public function run()
    {
     DB::table('database_settings')->insert([
        [
            'name'=>'kuota_kelas',
            'value'=>30,
            'info'=>'Kuota pendaftaran di tiap kelas'
        ],
        [
            'name'=>'nsm',
            'value'=>'121235080122',
            'info'=>'Nomor Statistik Madrasah'
        ],
        [
            'name'=>'nis_start_from',
            'value'=>771,
            'info'=>'dimulainya nomor urut (nis) jika belum ada database sama sekali'
        ],
        [
            'name'=>'wa',
            'value'=>'6285282513643',
            'info'=>'Admin 1'
        ],
        [
            'name'=>'wa',
            'value'=>'6281554055650',
            'info'=>'Admin 2'
        ],
        [
            'name'=>'wa',
            'value'=>'6285204944257',
            'info'=>'P. Rozaq'
        ],
    ]);
    }
}
