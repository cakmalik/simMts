<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'super',
            'guard_name'=>'web'
        ]);
        Role::create([
            'name'=>'admin',
            'guard_name'=>'web'
        ]);
        Role::create([
            'name'=>'calonsiswa',
            'guard_name'=>'web'
        ]);
        Role::create([
            'name'=>'siswa',
            'guard_name'=>'web'
        ]);
        Role::create([
            'name'=>'alumni',
            'guard_name'=>'web'
        ]);
        
    }
}
