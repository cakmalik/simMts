@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data Siswa</h1>
    <a href="{{ route('export_excel') }}">Export Excel</a>
@stop

@section('content')
    @include('sweet::alert')
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="table table-bordered table-striped">
                    <table id="example" class="table table-bordered table-striped data-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kota</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('data_siswa') }}",
                    data: function(d) {
                        d.email = $('.searchEmail').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'kota',
                        name: 'kota'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                "columnDefs": [{
                        "width": "10px",
                        "targets": 0
                    },
                    {
                        "width": "40px",
                        "targets": 1
                    },
                    {
                        "width": "40px",
                        "targets": 2
                    },
                    {
                        "width": "40px",
                        "targets": 3
                    },
                ],
            });

            $(".searchEmail").keyup(function() {
                table.draw();
            });

        });

    </script>
@stop
