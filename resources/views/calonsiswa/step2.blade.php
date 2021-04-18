@extends('template.CalonSantriTemplate')
@section('title', 'Step 2')
@section('step2', 'active')
@section('content')

    {{-- $table->string('asal_sekolah');
    $table->string('npsn_sekolah');
    $table->string('alamat_sekolah_asal');
    $table->string('no_un');
    $table->string('no_seri_ijazah');
    $table->string('no_skhun');
    $table->string('prestasi');
    $table->string('tingkat_prestasi'); --}}


    <form class="pt-6 mt-6" method="POST" action="{{ route('step2.update') }}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="asal_sekolah">Nama Sekolah Asal </label>
                        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}" class="form-control"
                            id="asal_sekolah" aria-describedby="asal_sekolah" placeholder="Contoh : SD AL-Baitul Amien">
                    </div>
                    <div class="form-group">
                        <label for="npsn_sekolah">Npsn Sekolah</label>
                        <input type="text" name="npsn_sekolah" value="{{ old('npsn_sekolah') }}" class="form-control"
                            id="npsn_sekolah" aria-describedby="npsn_sekolah" placeholder="Contoh : 20178214">
                    </div>
                    <div class="form-group">
                        <label for="alamat_sekolah_asal">Alamat Sekolah Asal</label>
                        <input type="text" name="alamat_sekolah_asal" value="{{ old('alamat_sekolah_asal') }}"
                            class="form-control" id="alamat_sekolah_asal" aria-describedby="alamat_sekolah_asal"
                            placeholder="contoh : Jl. jeruk GG.6 Leces, Probolinggo">
                    </div>
                    <div class="form-group">
                        <label for="no_un">No Peserta Ujian Nasional (UN)</label>
                        <input type="text" name="no_un" value="{{ old('no_un') }}" class="form-control" id="no_un"
                            aria-describedby="no_un" placeholder="contoh : 2-18-20-09-110-005-4">
                    </div>

                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="no_seri_ijazah">No Seri Ijazah</label>
                        <input type="text" name="no_seri_ijazah" value="{{ old('no_seri_ijazah') }}" class="form-control"
                            id="no_seri_ijazah" aria-describedby="no_seri_ijazah" placeholder="contoh : DN-05 Dl 0014933">
                    </div>
                    <div class="form-group">
                        <label for="no_skhun">No SKHUN</label>
                        <input type="text" name="no_skhun" value="{{ old('no_skhun') }}" class="form-control"
                            id="no_skhun" aria-describedby="no_skhun" placeholder="contoh : 1-342-1-11-1445-24225-234">
                    </div>
                    <div class="form-group">
                        <label for="prestasi">Prestasi</label>
                        <input type="text" name="prestasi" value="{{ old('prestasi') }}" class="form-control"
                            id="prestasi" aria-describedby="prestasi" placeholder="contoh: futsal 2010, olimpiade MTK">
                    </div>
                    <div class="form-group">
                        <label for="tingkat_prestasi">Tingkat prestasi</label>
                        <input type="text" name="tingkat_prestasi" value="{{ old('tingkat_prestasi') }}"
                            class="form-control" id="tingkat_prestasi" aria-describedby="tingkat_prestasi"
                            placeholder="contoh: Sekolah, Provinsi">
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
