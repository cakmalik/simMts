@extends('template.CalonSantriTemplate')
@section('content')
    <div class="div text-center">
        <h4> Selamat, Pendaftaran terkirim.</h4>
        <div class="pt-6">
            <a href="{{ route('keluar') }}" class="btn btn-danger">KELUAR</a>
            <a href="{{ route('home') }}" class="btn btn-success">HOME</a>
        </div>
    </div>
@endsection
