@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop
@php
$baru = DB::table('students')
    ->where('role_id', '=', 3)
    ->count();
$aktif = DB::table('students')
    ->where('role_id', '=', 4)
    ->count();
$baru_pa = DB::table('students')
    ->where(['role_id' => 3, 'jenis_kelamin' => 'Laki-laki'])
    ->count();
$baru_pi = DB::table('students')
    ->where(['role_id' => 3, 'jenis_kelamin' => 'Perempuan'])
    ->count();
$pa = DB::table('students')
    ->where(['role_id' => 4, 'jenis_kelamin' => 'Laki-laki'])
    ->count();
$pi = DB::table('students')
    ->where(['role_id' => 4, 'jenis_kelamin' => 'Perempuan'])
    ->count();
@endphp
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <a href="{{ route('data_calon_siswa') }}">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-plus"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text text-dark">CALON SISWA</span>
                                <span class="info-box-number  text-dark">
                                    {{ $baru }}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-6">
                    <a href="{{ route('seluruh_siswa') }}">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text text-dark">SISWA AKTIF</span>
                                <span class="info-box-number  text-dark">{{ $aktif }}</span>
                            </div>
                        </div>
                    </a>
                </div>


                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text text-dark">JUMLAH SISWA</span>
                            <span class="info-box-number">{{ $pa }}</span>
                        </div>

                    </div>

                </div>

                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text text-dark">JUMLAH SISWI</span>
                            <span class="info-box-number">{{ $pi }}</span>
                        </div>

                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
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
