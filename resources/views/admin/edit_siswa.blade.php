@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Siswa</h1>
@stop

@section('content')
    @include('sweet::alert')
    <div class="card">
        {{-- <div class="card-header">
            <a href="{{ URL::previous() }}" class="btn btn-default btn-sm"><i class="fas fa-arrow-left"></i></a>
        </div> --}}
        <div class="card-body">
            <div class="container-fluid">
                <form method="post" action="{{ route('update_siswa', $student->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">

                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" value="{{ $student->nama_lengkap }}"
                                    class="form-control" id="nama_lengkap" aria-describedby="nama_lengkap"
                                    placeholder="Nama Lengkap">
                            </div>

                            <div class="form-group">
                                <label for="nisn">NISN (Nomor Induk Siswa Nasional)</label>
                                <input type="text" name="nisn" value="{{ $student->nisn }}" class="form-control" id="nisn"
                                    aria-describedby="nisn" placeholder="Contoh : 1231588">
                            </div>
                            <div class="form-group">
                                <label for="nik">No. NIK / KTP</label>
                                <input type="text" name="nik" value="{{ $student->nik }}" class="form-control" id="nik"
                                    aria-describedby="nik" placeholder="Contoh : 35150518089800002">
                            </div>
                            <div class="form-group">
                                <label for="kk">No. KK</label>
                                <input type="text" name="kk" value="{{ $student->kk }}" class="form-control" id="kk"
                                    aria-describedby="kk" placeholder="No KK">
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" value="{{ $student->tempat_lahir }}"
                                    class="form-control" id="tempat_lahir" aria-describedby="tempat_lahir"
                                    placeholder="Tempat lahir">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal lahir</label>
                                <input type="text" name="tanggal_lahir" value="{{ $student->tanggal_lahir }}"
                                    class="form-control" id="tanggal_lahir" aria-describedby="tanggal_lahir"
                                    placeholder="Tanggal lahir">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" value="{{ $student->jenis_kelamin }}"
                                    class="form-control" id="jenis_kelamin" aria-describedby="jenis_kelamin"
                                    placeholder="Jenis Kelamin">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat rumah</label>
                                <input type="text" name="alamat" value="{{ $student->alamat }}" class="form-control"
                                    id="alamat" aria-describedby="alamat" placeholder="Alamat rumah">
                            </div>

                            <div class="form-group">
                                <label for="desa">Desa/Kelurahan</label>
                                <input type="text" name="desa" value="{{ $student->desa }}" class="form-control" id="desa"
                                    aria-describedby="desa" placeholder="Desa">
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" name="kecamatan" value="{{ $student->kecamatan }}"
                                    class="form-control" id="kecamatan" aria-describedby="kecamatan" placeholder="Desa">
                            </div>
                            <div class="form-group">
                                <label for="kota">Kab/Kota</label>
                                <input type="text" name="kota" value="{{ $student->kota }}" class="form-control"
                                    id="kota" aria-describedby="kota" placeholder="Kab">
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" name="provinsi" value="{{ $student->provinsi }}" class="form-control"
                                    id="provinsi" aria-describedby="provinsi" placeholder="Provinsi">
                            </div>
                            <div class="form-group">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" name="kode_pos" value="{{ $student->kode_pos }}" class="form-control"
                                    id="kode_pos" aria-describedby="kode_pos" placeholder="Kode Pos">
                            </div>
                            <div class="form-group">
                                <label for="nisn">No Hp</label>
                                <input type="text" name="no_hp" value="{{ $student->no_hp }}" class="form-control"
                                    id="nisn" aria-describedby="emailHelp" placeholder="No Hp / Wa">
                            </div>
                            <div class="form-group">
                                <label for="nisn">Hobi</label>
                                <input type="text" name="hobi" value="{{ $student->hobi }}" class="form-control"
                                    id="nisn" aria-describedby="emailHelp" placeholder="Hobi">
                            </div>
                            <div class="form-group">
                                <label for="nisn">Cita-cita</label>
                                <input type="text" name="cita_cita" value="{{ $student->cita_cita }}"
                                    class="form-control" id="nisn" aria-describedby="emailHelp" placeholder="Cita-cita">
                            </div>
                            <div class="form-group">
                                <label for="asal_sekolah">Nama Sekolah Asal </label>
                                <input type="text" name="asal_sekolah" value="{{ $student->asal_sekolah }}"
                                    class="form-control" id="asal_sekolah" aria-describedby="asal_sekolah"
                                    placeholder="Contoh : SD AL-Baitul Amien">
                            </div>
                            <div class="form-group">
                                <label for="npsn_sekolah">Npsn Sekolah</label>
                                <input type="text" name="npsn_sekolah" value="{{ $student->npsn_sekolah }}"
                                    class="form-control" id="npsn_sekolah" aria-describedby="npsn_sekolah"
                                    placeholder="Contoh : 20178214">
                            </div>
                            <div class="form-group">
                                <label for="alamat_sekolah_asal">Alamat Sekolah Asal</label>
                                <input type="text" name="alamat_sekolah_asal" value="{{ $student->alamat_sekolah_asal }}"
                                    class="form-control" id="alamat_sekolah_asal" aria-describedby="alamat_sekolah_asal"
                                    placeholder="contoh : Jl. jeruk GG.6 Leces, Probolinggo">
                            </div>
                            <div class="form-group">
                                <label for="no_un">No Peserta Ujian Nasional (UN)</label>
                                <input type="text" name="no_un" value="{{ $student->no_un }}" class="form-control"
                                    id="no_un" aria-describedby="no_un" placeholder="contoh : 2-18-20-09-110-005-4">
                            </div>
                            <div class="form-group">
                                <label for="no_seri_ijazah">No Seri Ijazah</label>
                                <input type="text" name="no_seri_ijazah" value="{{ $student->no_seri_ijazah }}"
                                    class="form-control" id="no_seri_ijazah" aria-describedby="no_seri_ijazah"
                                    placeholder="contoh : DN-05 Dl 0014933">
                            </div>
                            <div class="form-group">
                                <label for="no_skhun">No SKHUN</label>
                                <input type="text" name="no_skhun" value="{{ $student->no_skhun }}" class="form-control"
                                    id="no_skhun" aria-describedby="no_skhun"
                                    placeholder="contoh : 1-342-1-11-1445-24225-234">
                            </div>
                        </div>
                        <div class="col-sm">


                            <div class="form-group">
                                <label for="prestasi">Prestasi</label>
                                <input type="text" name="prestasi" value="{{ $student->prestasi }}" class="form-control"
                                    id="prestasi" aria-describedby="prestasi" placeholder="prestasi">
                            </div>
                            <div class="form-group">
                                <label for="tingkat_prestasi">Tingkat prestasi</label>
                                <input type="text" name="tingkat_prestasi" value="{{ $student->tingkat_prestasi }}"
                                    class="form-control" id="tingkat_prestasi" aria-describedby="tingkat_prestasi"
                                    placeholder="tingkat_prestasi">
                            </div>
                            <div class="form-group">
                                <label for="status_keluarga">Status dalam keluarga</label>
                                <input type="text" name="status_keluarga" value="{{ $student->status_keluarga }}"
                                    class="form-control" id="status_keluarga" aria-describedby="status_keluarga"
                                    placeholder="status_keluarga">
                            </div>
                            <div class="form-group">
                                <label for="anak_ke">Anak ke ... dari ... </label>
                                <input type="text" name="anak_ke" value="{{ $student->anak_ke }}" class="form-control"
                                    id="anak_ke" aria-describedby="anak_ke" placeholder="Contoh : 3,4 (pisahkan dg koma)">
                            </div>
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" name="nama_ayah" value="{{ $student->nama_ayah }}"
                                    class="form-control" id="nama_ayah" aria-describedby="nama_ayah"
                                    placeholder="nama ayah">
                            </div>
                            <div class="form-group">
                                <label for="nik_ayah">NIK ayah</label>
                                <input type="text" name="nik_ayah" value="{{ $student->nik_ayah }}" class="form-control"
                                    id="nik_ayah" aria-describedby="nik_ayah" placeholder="Contoh : 35150518089800002">
                            </div>
                            <div class="form-group">
                                <label for="tempatlahir_ayah">Tempat lahir ayah</label>
                                <input type="text" name="tempatlahir_ayah" value="{{ $student->tempatlahir_ayah }}"
                                    class="form-control" id="tempatlahir_ayah" aria-describedby="tempatlahir ayah"
                                    placeholder="tempatlahir ayah">
                            </div>
                            <div class="form-group">
                                <label for="tanggallahir_ayah">Tanggal lahir ayah</label>
                                <input type="text" name="tanggallahir_ayah" value="{{ $student->tanggallahir_ayah }}"
                                    class="form-control" id="tanggallahir_ayah" aria-describedby="tanggallahir ayah"
                                    placeholder="tanggallahir ayah">
                            </div>
                            <div class="form-group">
                                <label for="pendidikan_ayah">Pendidikan terakhir ayah</label>
                                <input type="text" name="pendidikan_ayah" value="{{ $student->pendidikan_ayah }}"
                                    class="form-control" id="pendidikan_ayah" aria-describedby="pendidikan ayah"
                                    placeholder="pendidikan ayah">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan ayah</label>
                                <input type="text" name="pekerjaan_ayah" value="{{ $student->pekerjaan_ayah }}"
                                    class="form-control" id="pekerjaan_ayah" aria-describedby="pekerjaan_ayah"
                                    placeholder="pekerjaan ayah">
                            </div>
                            <div class="form-group">
                                <label for="nama_ibu">Nama ibu</label>
                                <input type="text" name="nama_ibu" value="{{ $student->nama_ibu }}" class="form-control"
                                    id="nama_ibu" aria-describedby="nama_ibu" placeholder="nama ibu">
                            </div>
                            <div class="form-group">
                                <label for="nik_ibu">NIK ibu</label>
                                <input type="text" name="nik_ibu" value="{{ $student->nik_ibu }}" class="form-control"
                                    id="nik_ibu" aria-describedby="nik_ibu" placeholder="Contoh : 35150518089800002">
                            </div>
                            <div class="form-group">
                                <label for="tempatlahir_ibu">Tempat lahir ibu</label>
                                <input type="text" name="tempatlahir_ibu" value="{{ $student->tempatlahir_ibu }}"
                                    class="form-control" id="tempatlahir_ibu" aria-describedby="tempatlahir ibu"
                                    placeholder="tempatlahir ibu">
                            </div>
                            <div class="form-group">
                                <label for="tanggallahir_ibu">Tanggal lahir ibu</label>
                                <input type="text" name="tanggallahir_ibu" value="{{ $student->tanggallahir_ibu }}"
                                    class="form-control" id="tanggallahir_ibu" aria-describedby="tanggallahir ibu"
                                    placeholder="tanggallahir ibu">
                            </div>
                            <div class="form-group">
                                <label for="pendidikan_ibu">Pendidikan terakhir ibu</label>
                                <input type="text" name="pendidikan_ibu" value="{{ $student->pendidikan_ibu }}"
                                    class="form-control" id="pendidikan_ibu" aria-describedby="pendidikan ibu"
                                    placeholder="pendidikan ibu">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan ibu</label>
                                <input type="text" name="pekerjaan_ibu" value="{{ $student->pekerjaan_ibu }}"
                                    class="form-control" id="pekerjaan_ibu" aria-describedby="pekerjaan_ibu"
                                    placeholder="pekerjaan ibu">
                            </div>
                            <div class="form-group">
                                <label for="penghasilan">Penghasilan Orang tua</label>
                                <input type="text" name="penghasilan" value="{{ $student->penghasilan }}"
                                    class="form-control" id="penghasilan" aria-describedby="penghasilan"
                                    placeholder="penghasilan">
                            </div>
                            <div class="form-group">
                                <label for="no_pkh">No PKH</label>
                                <input type="text" name="no_pkh" value="{{ $student->no_pkh }}" class="form-control"
                                    id="no_pkh" aria-describedby="no_pkh" placeholder="no_pkh">
                            </div>
                            <div class="form-group">
                                <label for="no_kks_kps">No KKS/KPS</label>
                                <input type="text" name="no_kks_kps" value="{{ $student->no_kks_kps }}"
                                    class="form-control" id="no_kks_kps" aria-describedby="no_kks_kps"
                                    placeholder="no_kks_kps">
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="no_kip">No KIP</label>
                                    <input type="text" name="no_kip" value="{{ $student->no_kip }}" class="form-control"
                                        id="no_kip" aria-describedby="no_kip" placeholder="no_kip">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" name="kelas" value="{{ $student->kelas }}" class="form-control"
                                        id="kelas" aria-describedby="kelas" placeholder="kelas">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="email">Email (Harap hati2 jika mengganti ini !)</label>
                                    <input type="email" name="email" value="{{ $student->email }}" class="form-control"
                                        id="email" aria-describedby="email" placeholder="email">
                                </div>
                            </div>
                            <div class="text-right mb-6">
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                            </div>
                        </div>


                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@stop

@section('js')

@stop
