@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
    @include('sweet::alert')
    <div class="card">
        {{-- <div class="card-header">
            <a href="{{ URL::previous() }}" class="btn btn-default btn-sm"><i class="fas fa-arrow-left"></i></a>
        </div> --}}
        <div class="card-body">
            <div class="container-fluid">
                <form method="post" action="{{route('super.updateuser',$data->id )}}" id="myForm">
                    @csrf
                    @method('PUT')
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                               <label for="name">Nama</label>
                               <input type="text" name="name" id="name" class="form-control" value="{{$data->name}}" aria-describedby="name">
                               {{-- <small id="email" class="text-muted">email</small> --}}
                             </div>
                         
                             <div class="form-group">
                               <label for="email">Email</label>
                               <input type="email" name="email" id="email" class="form-control" value="{{$data->email}}" aria-describedby="email">
                               {{-- <small id="email" class="text-muted">email</small> --}}
                             </div>

                             <div class="form-group">
                               <label for="password">Password</label>
                               <input type="text" name="password" id="password" class="form-control" aria-describedby="password">
                               <small id="email" class="text-muted">Kosongkan bila tidak ingin mengganti password lama</small>
                             </div>
                         </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
