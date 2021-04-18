<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;
    public function definition()
    {
         //Array values
        // $kelas = ['7A', '7B', '7C', '7D'];
        return [
            'email'=>$this->faker->unique()->safeEmail,
            'nama_lengkap'=>$this->faker->name,
            'nisn'=>$this->faker->name,
            'nik'=>$this->faker->name,
            'kk'=>$this->faker->name,
            'tempat_lahir'=>$this->faker->name,
            'tanggal_lahir'=>$this->faker->name,
            'jenis_kelamin'=>$this->faker->randomElement(['Laki-laki','Perempuan']),
            'alamat'=>$this->faker->name,
            'desa'=>$this->faker->name,
            'kecamatan'=>$this->faker->name,
            'kota'=>$this->faker->name,
            'provinsi'=>$this->faker->name,
            'kode_pos'=>$this->faker->name,
            'no_hp'=>$this->faker->name,
            'hobi'=>$this->faker->name,
            'cita_cita'=>$this->faker->name,

            'asal_sekolah'=>$this->faker->name,
            'npsn_sekolah'=>$this->faker->name,
            'alamat_sekolah_asal'=>$this->faker->name,
            'no_un'=>$this->faker->name,
            'no_seri_ijazah'=>$this->faker->name,
            'no_skhun'=>$this->faker->name,
            'prestasi'=>$this->faker->name,
            'tingkat_prestasi'=>$this->faker->name,

            'status_keluarga'=>$this->faker->name,
            'anak_ke'=>$this->faker->name,
            'nama_ayah'=>$this->faker->name,
            'nik_ayah'=>$this->faker->name,
            'tempatlahir_ayah'=>$this->faker->name,
            'tanggallahir_ayah'=>$this->faker->name,
            'pendidikan_ayah'=>$this->faker->name,
            'pekerjaan_ayah'=>$this->faker->name,
            'nama_ibu'=>$this->faker->name,
            'nik_ibu'=>$this->faker->name,
            'tempatlahir_ibu'=>$this->faker->name,
            'tanggallahir_ibu'=>$this->faker->name,
            'pendidikan_ibu'=>$this->faker->name,
            'pekerjaan_ibu'=>$this->faker->name,
            'penghasilan'=>$this->faker->name,

            'no_pkh'=>$this->faker->name,
            'no_kks_kps'=>$this->faker->name,
            'no_kip'=>$this->faker->name,

            'role_id'=>3,
            'kelas'=>$this->faker->randomElement(['']),
        ];
    }
}
