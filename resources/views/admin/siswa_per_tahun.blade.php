@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between">
        <div>
            <h4>Siswa {{ $tahun }}</h4>
            <a href="{{ route('excel_siswa_tahun', $tahun) }}">Export Excel</a>

        </div>
        <form action="{{ route('siswa_tahun') }}" method="POST">
            <div class="row">
                <div class="col-6">
                    @csrf
                    <div class="form-group">
                        <select name="tahun" class="form-control">
                            {{ $first = 2019 }}
                            {{ $now = date('Y') }}
                            <option selected>Pilih</option>
                            @for ($i = $now; $i >= $first; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
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
    <div class="container">
        <div class="row">

            <div class="table-responsive">
                <div class="table table-bordered table-striped">
                    <table id="example" class="table table-bordered table-striped" style="width:80%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Kota</th>
                                <th>Orang tua</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $std)
                                <tr>
                                    <td style="width: 1px">{{ $loop->iteration }}</td>
                                    <td>{{ $std->nama_lengkap }}</td>
                                    <td>{{ $std->nisn }}</td>
                                    <td>{{ $std->kota }}</td>
                                    <td>{{ $std->nama_ayah }}</td>
                                    <td>
                                        <a class='btn btn-sm btn-warning' href='{{ route('siswa_detail', $std->id) }}'><i
                                                class='fas fa-search-plus'></i>
                                        </a>
                                        <a class='btn btn-sm btn-warning' href='{{ route('siswa_edit', $std->id) }}'><i
                                                class='fas fa-edit'></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@stop

@section('js')
    {{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // Setup - add a text input to each footer cell
            $('#example thead tr').clone(true).appendTo('#example thead');
            $('#example thead tr:eq(1) th').each(function(i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });

            });

            var table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true
            });
        });

    </script>

@stop
