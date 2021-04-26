<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KelasExport implements FromQuery, WithMapping, WithHeadings
{

protected $kelas;

 function __construct($kelas) {
        $this->kelas = $kelas;
 }

    public function query()
    {
        return Student::where('kelas', $this->kelas);
    }
    public function map($siswa): array
    {
        return [
            $siswa->nis,
            $siswa->email,
            $siswa->nama_lengkap,
            '`'.$siswa->nisn,
            '`'.$siswa->nik,
            '`'.$siswa->kk,
            $siswa->tempat_lahir,
            date('d F Y', strtotime($siswa->tanggal_lahir)),
            $siswa->jenis_kelamin,
            $siswa->alamat,
            $siswa->desa,
            $siswa->kecamatan,
            $siswa->kota,
            $siswa->provinsi,
            $siswa->kode_pos,
            '`'.$siswa->no_hp,
            $siswa->hobi,
            $siswa->cita_cita,
            
            $siswa->asal_sekolah,
            $siswa->npsn_sekolah,
            $siswa->alamat_sekolah_asal,
            '`'.$siswa->no_un,
            $siswa->no_seri_ijazah,
            $siswa->no_skhun,
            $siswa->prestasi,
            $siswa->tingkat_prestasi,
            
            $siswa->status_keluarga,
            $siswa->anak_ke,
            $siswa->nama_ayah,
            '`'.$siswa->nik_ayah,
            $siswa->tempatlahir_ayah,
            date('d F Y', strtotime($siswa->tanggallahir_ayah)),
            $siswa->pendidikan_ayah,
            $siswa->pekerjaan_ayah,
            $siswa->nama_ibu,
            '`'.$siswa->nik_ibu,
            $siswa->tempatlahir_ibu,
            date('d F Y', strtotime($siswa->tanggallahir_ibu)),
            $siswa->pendidikan_ibu,
            $siswa->pekerjaan_ibu,
            $siswa->penghasilan,
            
            '`'.$siswa->no_pkh,
            '`'.$siswa->no_kks_kps,
            '`'.$siswa->no_kip,

            $siswa->kelas,
        ];
    }

    public function headings():array
    {
        return [
           'nis',
           'email',
           'nama_lengkap',
           'nisn',
           'nik',
           'kk',
           'tempat_lahir',
           'tanggal_lahir',
           'jenis_kelamin',
           'alamat',
           'desa',
           'kecamatan',
           'kota',
           'provinsi',
           'kode_pos',
           'no_hp',
           'hobi',
           'cita_cita',
            
           'asal_sekolah',
           'npsn_sekolah',
           'alamat_sekolah_asal',
           'no_un',
           'no_seri_ijazah',
           'no_skhun',
           'prestasi',
           'tingkat_prestasi',
            
           'status_keluarga',
           'anak_ke',
           'nama_ayah',
           'nik_ayah',
           'tempatlahir_ayah',
           'tanggallahir_ayah',
           'pendidikan_ayah',
           'pekerjaan_ayah',
           'nama_ibu',
           'nik_ibu',
           'tempatlahir_ibu',
           'tanggallahir_ibu',
           'pendidikan_ibu',
           'pekerjaan_ibu',
           'penghasilan',
            
           'no_pkh',
           'no_kks_kps',
           'no_kip',

           'kelas',
        ];
    }
}
