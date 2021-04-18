@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Siswa</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <form method="post" action="{{ route('updateImage', $data->id) }}" enctype="multipart/form-data">
                    <hr>
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <label for="foto_siswa">Foto baru Ortu</label>
                                <input type="file" name="foto_ortu" value="{{ $data->foto_ortu }}" class="form-control"
                                    id="foto_ortu" placeholder="Browse">
                            </div>
                            <div class="form-group">
                                <label for="foto_siswa">Foto baru Siswa</label>
                                <input type="file" name="foto_siswa" value="{{ $data->foto_siswa }}" class="form-control"
                                    id="foto_siswa" placeholder="Browse">
                            </div>
                        </div>
                    </div>
                    <div class="text-right mb-6">
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
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
