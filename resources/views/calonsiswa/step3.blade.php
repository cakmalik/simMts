@extends('template.CalonSantriTemplate')
@section('title', 'Step 3')
@section('step3', 'active')
@section('content')


    <form class="pt-6 mt-6" method="POST" action="{{ route('step3.update') }}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="status_keluarga">Status dalam keluarga</label>
                        <select class="form-control" name="status_keluarga" id="status_keluarga">
                            <option>Anak Kandung</option>
                            <option>Anak Tiri</option>
                            <option>Anak Angkat</option>
                            <option>Anak Asuh</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="anak_ke">Anak ke ... dari ... </label>
                        <input type="text" name="anak_ke" value="{{ old('anak_ke') }}" class="form-control" id="anak_ke"
                            aria-describedby="anak_ke" placeholder="Contoh : 3,4 (pisahkan dg koma)">
                    </div>
                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" class="form-control"
                            id="nama_ayah" aria-describedby="nama_ayah" placeholder="nama ayah">
                    </div>
                    <div class="form-group">
                        <label for="nik_ayah">NIK ayah</label>
                        <input type="number" name="nik_ayah" value="{{ old('nik_ayah') }}" class="form-control"
                            id="nik_ayah" aria-describedby="nik_ayah" placeholder="Contoh : 35150518089800002">
                    </div>
                    <div class="form-group">
                        <label for="tempatlahir_ayah">Tempat lahir ayah</label>
                        <input type="text" name="tempatlahir_ayah" value="{{ old('tempatlahir_ayah') }}"
                            class="form-control" id="tempatlahir_ayah" aria-describedby="tempatlahir ayah"
                            placeholder="tempatlahir ayah">
                    </div>
                    <div class="form-group">
                        <label for="tanggallahir_ayah">Tanggal lahir ayah</label>
                        <input type="date" name="tanggallahir_ayah" value="{{ old('tanggallahir_ayah') }}"
                            class="form-control" id="tanggallahir_ayah" aria-describedby="tanggallahir ayah"
                            placeholder="tanggallahir ayah">
                    </div>
                    <div class="form-group">
                        <label for="pendidikan_ayah">Pendidikan terakhir ayah</label>
                        <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control">
                            <option value="-">{{ old('pendidikan_ayah') }}</option>
                            <option>Tidak Sekolah</option>
                            <option>Putus SD</option>
                            <option>SD Sederajat</option>
                            <option>SMP Sederajat</option>
                            <option>SMA Sederajat</option>
                            <option>D1</option>
                            <option>D2</option>
                            <option>D3</option>
                            <option>D4/S1</option>
                            <option>S2</option>
                            <option>S3</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan_ayah">Pekerjaan ayah</label>
                        <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control">
                            <option>Tidak Bekerja</option>
                            <option>Nelayan</option>
                            <option>Petani</option>
                            <option>Peternak</option>
                            <option>PNS/TNI/Polri</option>
                            <option>Karyawan Swasta</option>
                            <option>Pedagang Kecil</option>
                            <option>Pedagang Besar</option>
                            <option>Wiraswasta</option>
                            <option>Wirausaha</option>
                            <option>Buruh</option>
                            <option>Pensiunan</option>
                            <option>Tenaga Kerja Indonesia</option>
                            <option>Tidak dapat diterapkan</option>
                            <option>Sudah Meninggal</option>
                            <option>Lainnya</option>
                        </select>
                    </div>


                </div>

                <div class="col-md">
                    <div class="form-group">
                        <label for="nama_ibu">Nama ibu</label>
                        <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="form-control"
                            id="nama_ibu" aria-describedby="nama_ibu" placeholder="nama ibu">
                    </div>
                    <div class="form-group">
                        <label for="nik_ibu">NIK ibu</label>
                        <input type="number" name="nik_ibu" value="{{ old('nik_ibu') }}" class="form-control" id="nik_ibu"
                            aria-describedby="nik_ibu" placeholder="Contoh : 35150518089800002">
                    </div>
                    <div class="form-group">
                        <label for="tempatlahir_ibu">Tempat lahir ibu</label>
                        <input type="text" name="tempatlahir_ibu" value="{{ old('tempatlahir_ibu') }}"
                            class="form-control" id="tempatlahir_ibu" aria-describedby="tempat lahir ibu"
                            placeholder="tempatlahir ibu">
                    </div>
                    <div class="form-group">
                        <label for="tanggallahir_ibu">Tanggal lahir ibu</label>
                        <input type="date" name="tanggallahir_ibu" value="{{ old('tanggallahir_ibu') }}"
                            class="form-control" id="tanggallahir_ibu" aria-describedby="tanggal lahir ibu"
                            placeholder="tanggallahir ibu">
                    </div>
                    <div class="form-group">
                        <label for="pendidikan_ibu">Pendidikan terakhir ibu</label>
                        <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control">
                            <option value="-">{{ old('pendidikan_ibu') }}</option>
                            <option>Tidak Sekolah</option>
                            <option>Putus SD</option>
                            <option>SD Sederajat</option>
                            <option>SMP Sederajat</option>
                            <option>SMA Sederajat</option>
                            <option>D1</option>
                            <option>D2</option>
                            <option>D3</option>
                            <option>D4/S1</option>
                            <option>S2</option>
                            <option>S3</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan_ibu">Pekerjaan ibu</label>
                        <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control">
                            <option>Tidak Bekerja</option>
                            <option>Nelayan</option>
                            <option>Petani</option>
                            <option>Peternak</option>
                            <option>PNS/TNI/Polri</option>
                            <option>Karyawan Swasta</option>
                            <option>Pedagang Kecil</option>
                            <option>Pedagang Besar</option>
                            <option>Wiraswasta</option>
                            <option>Wirausaha</option>
                            <option>Buruh</option>
                            <option>Pensiunan</option>
                            <option>Tenaga Kerja Indonesia</option>
                            <option>Tidak dapat diterapkan</option>
                            <option>Sudah Meninggal</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penghasilan">Penghasilan orang tua</label>
                        <select name="penghasilan" id="penghasilan" class="form-control">
                            <option>Rp. 1.000.000 - Rp. 2.000.000</option>
                            <option>lebh dari Rp. 2.000.000</option>
                            <option>kurang dari Rp. 500.000</option>
                            <option>Rp. 500.000 - Rp. 999.000</option>
                            <option>Rp. 1.000.000 - Rp. 1.999.000</option>
                            <option>Rp. 2.000.000 - Rp. 4.999.000</option>
                            <option>Rp. 5.000.000 - Rp. 20.000.000</option>
                            <option>Lebih dari Rp. 20.000.000</option>
                            <option>Tidak berpenghasilan</option>
                            <option>Lainnya</option>

                        </select>
                    </div>
                </div>
            </div>

            <div class="text-right mb-6">
                <button type="submit" class="btn btn-primary mt-3">Berikutnya</button>
            </div>
        </div>
    </form>

    <hr>
@endsection
