@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @php
    $email = Auth::user()->email;
    $std = DB::table('students')
        ->where('email', $email)
        ->first();
    @endphp


    @if ($std)
        @if ($std->role_id == 3)
            <div class="alert alert-warning" role="alert">
                Status pendaftaran : Menunggu verifikasi oleh admin
            </div>
        @else
            <div class="alert alert-success" role="alert">
                Selamat, anda diterima sebagai siswa kelas : {{ $std->kelas }}
            </div>
        @endif
        {{-- <div class="alert alert-success" role="alert">
        Sebagai alumni :
    </div> --}}
    @else
    @endif

    <h1>{{ $title ?? 'Detail siswa' }}</h1>
@stop
@section('content')
    @include('sweet::alert')
    <div class="card">
        <div class="card-header ui-sortable-handle">
            <h3 class="card-title">
                <a href=" {{ URL::previous() }}" class="btn btn-default btn-sm"><i class="fas fa-arrow-left"></i></a>

                <a href=" {{ route('cetakbiodata', $data->id) }}" class="btn btn-success btn-sm"><i
                        class="fas fa-print"></i> Biodata</a>
                <a href=" {{ route('generatePDF_mou', $data->id) }}" class="btn btn-success btn-sm"><i
                        class="fas fa-print"></i> MoU</a>
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#pribadi" data-toggle="tab">Pribadi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ortu" data-toggle="tab">Ortu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#lainnya" data-toggle="tab">Lainnya</a>
                    </li>

                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="pribadi">
                    <table class="table table-striped">
                        <tr class="justify-content-center">
                            <td colspan="2">
                                <img style="width: 300px" src="{{ url('/Foto/Siswa/' . $data->foto_siswa) }}"
                                    class="img-thumbnail">
                            </td>
                        </tr>
                        <tr>
                            <td> Nama </td>
                            <td>: {{ $data->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td> NIS </td>
                            @if ($data->nis)
                                @php
                                    $nis = explode(' ', $data->nis);
                                    $nis = $nis[0] . $nis[1] . $nis[2];
                                @endphp
                            @else
                                @php
                                    $nis = $data->nis;
                                @endphp
                            @endif
                            <td>: {{ $nis }}</td>
                        </tr>
                        <tr>
                            <td> Kelas </td>
                            <td>: {{ $data->kelas }}</td>
                        </tr>
                        <tr>
                            <td> email</td>
                            <td>: {{ $data->email }}</td>
                        </tr>
                        <tr>
                            <td> nama lengkap</td>
                            <td>: {{ $data->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td> nisn</td>
                            <td>: {{ $data->nisn }}</td>
                        </tr>
                        <tr>
                            <td> nik</td>
                            <td>: {{ $data->nik }}</td>
                        </tr>
                        <tr>
                            <td> kk</td>
                            <td>: {{ $data->kk }}</td>
                        </tr>
                        <tr>
                            <td> tempat lahir</td>
                            <td>: {{ $data->tempat_lahir }}</td>
                        </tr>
                        <tr>
                            <td> tanggal lahir</td>
                            <td>: {{ $data->tanggal_lahir }}</td>
                        </tr>
                        <tr>
                            <td> jenis kelamin</td>
                            <td>: {{ $data->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td> alamat</td>
                            <td>: {{ $data->alamat }}</td>
                        </tr>
                        <tr>
                            <td> desa</td>
                            <td>: {{ $data->desa }}</td>
                        </tr>
                        <tr>
                            <td> kecamatan</td>
                            <td>: {{ $data->kecamatan }}</td>
                        </tr>
                        <tr>
                            <td> kota</td>
                            <td>: {{ $data->kota }}</td>
                        </tr>
                        <tr>
                            <td> provinsi</td>
                            <td>: {{ $data->provinsi }}</td>
                        </tr>
                        <tr>
                            <td> kode pos</td>
                            <td>: {{ $data->kode_pos }}</td>
                        </tr>
                        <tr>
                            <td> no hp</td>
                            <td>: {{ $data->no_hp }}</td>
                        </tr>
                        <tr>
                            <td> hobi</td>
                            <td>: {{ $data->hobi }}</td>
                        </tr>
                        <tr>
                            <td> cita cita</td>
                            <td>: {{ $data->cita_cita }}</td>
                        </tr>
                    </table>
                    @php
                        $role = Auth::user()->name;
                    @endphp
                    @if ($role == 'Admin')
                        <form action="{{ route('hapus_siswa', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-sm btn-info" href="{{ route('siswa_edit', $data->id) }}">Edit Data</a>
                            <a class="btn btn-sm btn-info" href="{{ route('editimage', $data->id) }}">Edit Foto</a>
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash"></i> HAPUS
                                SISWA</button>
                        </form>
                    @else
                        <a class="btn btn-sm btn-info" href="{{ route('editimage', $data->id) }}">Edit Foto</a>
                    @endif

                </div>
                <div class="chart tab-pane" id="ortu">
                    <table class="table table-striped">
                        <tr class="justify-content-center">
                            <td colspan="2">
                                <img style="width: 300px" src="{{ url('/Foto/Ortu/' . $data->foto_ortu) }}"
                                    class="img-thumbnail">
                            </td>
                        </tr>
                        <tr>
                            <td> status keluarga</td>
                            <td>: {{ $data->status_keluarga }}</td>
                        </tr>
                        <tr>
                            <td> anak ke</td>
                            <td>: {{ $data->anak_ke }}</td>
                        </tr>
                        <tr>
                            <td> nama ayah</td>
                            <td>: {{ $data->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <td> nik ayah</td>
                            <td>: {{ $data->nik_ayah }}</td>
                        </tr>
                        <tr>
                            <td> tempatlahir ayah</td>
                            <td>: {{ $data->tempatlahir_ayah }}</td>
                        </tr>
                        <tr>
                            <td> tanggallahir ayah</td>
                            <td>: {{ $data->tanggallahir_ayah }}</td>
                        </tr>
                        <tr>
                            <td> pendidikan ayah</td>
                            <td>: {{ $data->pendidikan_ayah }}</td>
                        </tr>
                        <tr>
                            <td> pekerjaan ayah</td>
                            <td>: {{ $data->pekerjaan_ayah }}</td>
                        </tr>
                        <tr>
                            <td> nama ibu</td>
                            <td>: {{ $data->nama_ibu }}</td>
                        </tr>
                        <tr>
                            <td> nik ibu</td>
                            <td>: {{ $data->nik_ibu }}</td>
                        </tr>
                        <tr>
                            <td> tempatlahir ibu</td>
                            <td>: {{ $data->tempatlahir_ibu }}</td>
                        </tr>
                        <tr>
                            <td> tanggallahir ibu</td>
                            <td>: {{ $data->tanggallahir_ibu }}</td>
                        </tr>
                        <tr>
                            <td> pendidikan ibu</td>
                            <td>: {{ $data->pendidikan_ibu }}</td>
                        </tr>
                        <tr>
                            <td> pekerjaan ibu</td>
                            <td>: {{ $data->pekerjaan_ibu }}</td>
                        </tr>
                        <tr>
                            <td> penghasilan</td>
                            <td>: {{ $data->penghasilan }}</td>
                        </tr>
                    </table>
                </div>

                <div class="chart tab-pane" id="lainnya">
                    <table class="table table-striped">
                        <tr>
                            <td> asal sekolah</td>
                            <td>: {{ $data->asal_sekolah }}</td>
                        </tr>
                        <tr>
                            <td> npsn sekolah</td>
                            <td>: {{ $data->npsn_sekolah }}</td>
                        </tr>
                        <tr>
                            <td> alamat sekolah_asal</td>
                            <td>: {{ $data->alamat_sekolah_asal }}</td>
                        </tr>
                        <tr>
                            <td> no un</td>
                            <td>: {{ $data->no_un }}</td>
                        </tr>
                        <tr>
                            <td> no seri ijazah</td>
                            <td>: {{ $data->no_seri_ijazah }}</td>
                        </tr>
                        <tr>
                            <td> no skhun</td>
                            <td>: {{ $data->no_skhun }}</td>
                        </tr>
                        <tr>
                            <td> prestasi</td>
                            <td>: {{ $data->prestasi }}</td>
                        </tr>
                        <tr>
                            <td> tingkat prestasi</td>
                            <td>: {{ $data->tingkat_prestasi }}</td>
                        </tr>
                        <tr>
                            <td> no pkh</td>
                            <td>: {{ $data->no_pkh }}</td>
                        </tr>
                        <tr>
                            <td> no kks/kps</td>
                            <td>: {{ $data->no_kks_kps }}</td>
                        </tr>
                        <tr>
                            <td> no kip</td>
                            <td>: {{ $data->no_kip }}</td>
                        </tr>
                </div>
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
