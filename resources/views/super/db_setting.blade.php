@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Database setting</h1>
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
                                <th>Name</th>
                                <th>Value</th>
                                <th>Info</th>
                                <th>Aktif/Tidak</th>
                                <th width="100px">Action</th>
                            </tr>

                            @foreach ($data as $set)
                            <form action="{{route('super.update_dbset',$set->id)}}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$set->name}}</td>
                                <td><input name="value" type="text" class="form-control" value="{{$set->value}}"></td>
                                <td>{{$set->info}}</td>
                                <td><input name="is_active" type="text" class="form-control" value="{{$set->is_active}}" placeholder="1=aktif | 2=tidak"></td>
                                <td>
                                        <button class="btn btn-sm btn-flat btn-success">Update</button>
                                </td>
                            </tr>
                            </form>
                            @endforeach

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
    
@stop

@section('js')
  

@stop
