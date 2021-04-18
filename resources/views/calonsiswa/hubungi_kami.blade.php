@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Hubungi kami</h1>
@stop

@php
$dbset = DB::table('database_settings')
    ->where('name', 'wa')
    ->get();
@endphp
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                @foreach ($dbset as $set)
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-phone"></i></span>
                            <a href="https://wa.me/{{ $set->value }}" target="_blank"
                                class="btn btn-default col-9 text-uppercase">
                                {{ $set->info }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

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
