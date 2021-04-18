 @php
     $curl_kota = curl_init();
     
     curl_setopt_array($curl_kota, [
         CURLOPT_URL => 'http://api.rajaongkir.com/starter/city',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'GET',
         CURLOPT_HTTPHEADER => ['key: 656724c6467711a1a6adfa81ff5e97ce'],
     ]);
     
     $response = curl_exec($curl_kota);
     $err = curl_error($curl_kota);
     
     curl_close($curl_kota);
     
     $listKota = []; //bikin array untuk nampung list kota
     
     if ($err) {
         echo 'cURL Error #:' . $err;
     } else {
         $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array
     
         $tempListKota = $arrayResponse['rajaongkir']['results']; // ambil array yang dibutuhin aja, disini resultnya aja
     
         //looping array temporary untuk masukin object yang kita butuhin
         foreach ($tempListKota as $value) {
             //bikin object baru
             $kota = new stdClass();
             $kota->id = $value['city_id']; //id kotanya
             $kota->nama = $value['city_name']; //nama kotanya
             $kota->type = $value['type']; //nama kotanya
     
             array_push($listKota, $kota); //push object kota yang kita bikin ke array yang nampung list kota
         }
     
         //$listKota : udah berisi list kota yang kita butuhin
     
         //ini untuk ngecek aja isi $list kota udah bener apa belum
         // foreach ($listKota as $kota) {
         //     echo '<pre>';
         //     echo 'id : ' . $kota->id . ' - ' . 'nama : ' . $kota->nama;
         // }
     
         // dd($listKota);
     }
 @endphp
 @php
     $curl_prov = curl_init();
     
     curl_setopt_array($curl_prov, [
         CURLOPT_URL => 'http://api.rajaongkir.com/starter/province',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'GET',
         CURLOPT_HTTPHEADER => ['key: 656724c6467711a1a6adfa81ff5e97ce'],
     ]);
     
     $response = curl_exec($curl_prov);
     $err = curl_error($curl_prov);
     
     curl_close($curl_prov);
     
     $listprov = []; //bikin array untuk nampung list kota
     
     if ($err) {
         echo 'cURL Error #:' . $err;
     } else {
         $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array
     
         $templistprov = $arrayResponse['rajaongkir']['results']; // ambil array yang dibutuhin aja, disini resultnya aja
     
         //looping array temporary untuk masukin object yang kita butuhin
         foreach ($templistprov as $value) {
             //bikin object baru
             $prov = new stdClass();
             //  $prov->id = $value['province_id']; //id provnya
             $prov->nama = $value['province']; //nama provnya
             //  $prov->type = $value['type']; //nama provnya
     
             array_push($listprov, $prov); //push object prov yang kita bikin ke array yang nampung list prov
         }
     
         //$listprov : udah berisi list prov yang kita butuhin
     
         //ini untuk ngecek aja isi $list prov udah bener apa belum
         // foreach ($listprov as $prov) {
         //     echo '<pre>';
         //     echo 'id : ' . $prov->id . ' - ' . 'nama : ' . $prov->nama;
         // }
     
         // dd($listprov);
     }
 @endphp

 @extends('template.CalonSantriTemplate')
 @section('title', 'Step 1')
 @section('step1', 'active')
 @section('content')

     <form class="" method="POST" action="{{ route('post_step1') }}">
         @csrf
         <div class="container">
             <div class="row">
                 <div class="col-sm">
                     <div class="form-group">
                         <label for="nama_lengkap">Nama Lengkap</label>
                         <input type="text" name="nama_lengkap" value="{{ Auth::user()->name }}" class="form-control"
                             id="nama_lengkap" aria-describedby="nama_lengkap" placeholder="Nama Lengkap">
                     </div>

                     <div class="form-group">
                         <label for="nisn">NISN (Nomor Induk Siswa Nasional)</label>
                         <input type="number" name="nisn" value="{{ old('nisn') }}" class="form-control" id="nisn"
                             aria-describedby="nisn" placeholder="Contoh : 1231588">
                     </div>
                     <div class="form-group">
                         <label for="nik">No. NIK / KTP</label>
                         <input type="number" name="nik" value="{{ old('nik') }}" class="form-control" id="nik"
                             aria-describedby="nik" placeholder="Contoh : 35150518089800002">
                     </div>
                     <div class="form-group">
                         <label for="kk">No. KK</label>
                         <input type="number" name="kk" value="{{ old('kk') }}" class="form-control" id="kk"
                             aria-describedby="kk" placeholder="No KK">
                     </div>
                     <div class="form-group">
                         <label for="tempat_lahir">Tempat Lahir</label>
                         <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control"
                             id="tempat_lahir" aria-describedby="tempat_lahir" placeholder="Tempat lahir">
                     </div>
                     <div class="form-group">
                         <label for="tanggal_lahir">Tanggal lahir</label>
                         <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control"
                             id="tanggal_lahir" aria-describedby="tanggal_lahir" placeholder="Tanggal lahir">
                     </div>
                     <div class="form-group">
                         <label for="jenis_kelamin">Jenis Kelamin</label>
                         <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                             <option>Laki-laki</option>
                             <option>Perempuan</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="alamat">Alamat rumah</label>
                         <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control" id="alamat"
                             aria-describedby="alamat" placeholder="Alamat rumah">
                     </div>
                 </div>
                 <div class="col-sm">

                     <div class="form-group">
                         <label for="desa">Desa/Kelurahan</label>
                         <input type="text" name="desa" value="{{ old('desa') }}" class="form-control" id="desa"
                             aria-describedby="desa" placeholder="Desa">
                     </div>
                     <div class="form-group">
                         <label for="kecamatan">Kecamatan</label>
                         <input type="text" name="kecamatan" value="{{ old('kecamatan') }}" class="form-control"
                             id="kecamatan" aria-describedby="kecamatan" placeholder="Desa">
                     </div>

                     <div class="form-group">
                         <label for="kota">Kota</label>
                         <select class="selectpicker form-control" data-live-search="true" name="kota" id="kota"
                             value="{{ old('kota') }}">
                             @foreach ($listKota as $kota)
                                 <option>{{ $kota->nama }} - {{ $kota->type }} </option>
                             @endforeach
                         </select>
                     </div>

                     <div class="form-group">
                         <label for="provinsi">Provinsi</label>
                         <select class="selectpicker form-control" data-live-search="true" name="provinsi" id="provinsi"
                             value="{{ old('provinsi') }}">
                             @foreach ($listprov as $prov)
                                 <option>{{ $prov->nama }} </option>
                             @endforeach
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="kode_pos">Kode Pos</label>
                         <input type="number" name="kode_pos" value="{{ old('kode_pos') }}" class="form-control"
                             id="kode_pos" aria-describedby="kode_pos" placeholder="Kode Pos">
                     </div>
                     <div class="form-group">
                         <label for="nisn">No Hp</label>
                         <input type="number" name="no_hp" value="{{ old('no_hp') }}" class="form-control" id="nisn"
                             aria-describedby="emailHelp" placeholder="No Hp / Wa">
                     </div>
                     <div class="form-group">
                         <label for="nisn">Hobi</label>
                         <input type="text" name="hobi" value="{{ old('hobi') }}" class="form-control" id="nisn"
                             aria-describedby="emailHelp" placeholder="Hobi">
                     </div>
                     <div class="form-group">
                         <label for="nisn">Cita-cita</label>
                         <input type="text" name="cita_cita" value="{{ old('cita_cita') }}" class="form-control"
                             id="nisn" aria-describedby="emailHelp" placeholder="Cita-cita">
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
