@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @php
    $grades = DB::table('grades')->get();
    @endphp
    <div class="d-flex justify-content-between">
        <div>
            <h4>Siswa {{ $kelas }}</h4>
            <a href="{{ route('excel_siswa_kelas', $kelas) }}">Export Excel</a>
        </div>
        <form action="{{ route('siswa_kelas') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <select name="kelas" class="form-control">
                            <option selected>{{ $kelas }}</option>
                            @foreach ($grades as $kelas)
                                <option>{{ $kelas->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3 mb-3">
                    <button class="btn btn-primary" type="submit">Terapkan</button>
                </div>
            </div>
        </form>
    </div>

@stop

@section('content')


    <div class="row">
        <div class="table-responsive">
            <div class="table table-bordered table-striped">
                <table id="example" class="table table-bordered table-striped" style="width:100%">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis kelamin</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    @forelse ($data as $key => $std)
                        <tr>
                            <td>{{ $data->firstItem() + $key }}</td>
                            <td>{{ $std->nama_lengkap }}</td>
                            <td>{{ $std->jenis_kelamin }}</td>
                            <td>{{ $std->kota }}</td>
                            <td>
                                <a class='btn btn-sm btn-warning' href='{{ route('siswa_detail', $std->id) }}'><i
                                        class='fas fa-search-plus'></i>
                                </a>
                                <a class='btn btn-sm btn-warning' href='{{ route('siswa_edit', $std->id) }}'><i
                                        class='fas fa-edit'></i></a>
                            </td>
                        </tr>
                    @empty
                        <p>No users</p>
                    @endforelse

                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@stop

@section('js')
<script>
    console.log('Hi!');

</script>
@stop
