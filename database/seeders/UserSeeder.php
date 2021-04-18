<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => "Hasin Ilmalik",
        //     'email' => 'm@m.m',
        //     'password' => Hash::make('123'),
        //     'level' => "1",
        //     'created_at' => now(),
        // ]);

        $super = User::create([
            'name'=>'Super Admin',
            'email'=>'super@role.test',
            'password'=>bcrypt('password')
        ]);
        $super->assignRole('super');

        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@role.test',
            'password'=>bcrypt('password')
        ]);
        $admin->assignRole('admin');

        $calonsiswa = User::create([
            'name'=>'calonsiswa',
            'email'=>'calonsiswa@role.test',
            'password'=>bcrypt('password')
        ]);
        $calonsiswa->assignRole('calonsiswa');

        $siswa = User::create([
            'name'=>'siswa',
            'email'=>'siswa@role.test',
            'password'=>bcrypt('password')
        ]);
        $siswa->assignRole('siswa');
        
        $alumni = User::create([
            'name'=>'User',
            'email'=>'alumni@role.test',
            'password'=>bcrypt('password')
        ]);
        $alumni->assignRole('alumni');
    }
}
