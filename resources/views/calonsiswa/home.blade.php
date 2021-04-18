@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

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
