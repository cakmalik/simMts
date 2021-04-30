
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h4>Akun siswa</h4>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <div class="table table-bordered table-striped">
                    <table id="example" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                       <form action="{{ route('user.destroy',$user->id) }}" method="POST">

                    {{-- <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Show</a>
                    --}}
                    <a class="btn btn-primary btn-sm" href="{{ route('super.edituser',$user->id) }}">Edit</a>
                    @csrf
                    @method('DELETE') 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini? (dampak = siswa tidak akan dapat menggunakan lagi akunnya)')">Hapus</button>
                </form>
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
                $(this).html('<input type="text" placeholder="" />');

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
