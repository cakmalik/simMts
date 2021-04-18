@extends('template.CalonSantriTemplate')
@section('title', 'Step 4')
@section('step4', 'active')
@section('content')

    {{-- $table->string('no_pkh');
    $table->string('no_kks_kps');
    $table->string('no_kip'); --}}

    <form class="pt-6 mt-6" method="POST" action="{{ route('step4.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="no_pkh">No PKH</label>
                        <input type="text" name="no_pkh" value="{{ old('no_pkh') }}" class="form-control" id="no_pkh"
                            aria-describedby="no_pkh" placeholder="no_pkh">
                    </div>
                    <div class="form-group">
                        <label for="no_kks_kps">No KKS/KPS</label>
                        <input type="text" name="no_kks_kps" value="{{ old('no_kks_kps') }}" class="form-control"
                            id="no_kks_kps" aria-describedby="no_kks_kps" placeholder="no_kks_kps">
                    </div>
                </div>

                <div class="col-md">
                    <div class="form-group">
                        <label for="no_kip">No KIP</label>
                        <input type="text" name="no_kip" value="{{ old('no_kip') }}" class="form-control" id="no_kip"
                            aria-describedby="no_kip" placeholder="no_kip">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="no_kip">Foto Siswa/i (max:500kb)</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="no_kip">Foto Ayah/Ortu (max:500kb)</label>
                        <input type="file" name="image_ortu" class="form-control">
                    </div>
                </div>
            </div>
            <div class="text-right mb-6">
                <button type="submit" class="btn btn-primary mt-3">Berikutnya</button>
            </div>

        </div>
    </form>

    <hr>
@endsection
