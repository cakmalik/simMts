@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cetak data</h1>
@stop

@php
$email = Auth::user()->email;
$std = DB::table('students')
    ->where('email', $email)
    ->first();
@endphp
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-arrow-down"></i></span>
                        <a href="{{ route('generatePDF_mou', $std->id) }}" class="btn btn-default col-9">
                            M O U
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-arrow-down"></i></span>

                        <a href="{{ route('cetakbiodata', $std->id) }}" class="btn btn-default col-9">
                            B I O D A T A
                        </a>
                    </div>
                </div>


                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-arrow-down"></i></span>

                        <a href="{{ route('cetakbiodata', $std->id) }}" class="btn btn-default col-9">
                            K T S
                        </a>
                    </div>
                </div>
                {{-- <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-arrow-down"></i></span>

                        <button class="btn btn-default col-9">
                            B I O D A T A
                        </button>
                    </div>
                </div>

            </div>
            <!-- /.row --> --}}
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
