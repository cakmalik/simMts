<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MOU</title>
    <style type="text/css">
        @font-face {
            font-family: 'bookman';
            src: url({{ storage_path('fonts/bookman old style.ttf') }}) format("truetype");
        }

        body {
            font-family: "bookman";
            font-size: 12px;
        }

    </style>
</head>

<body>
    <img style="width: 100%" src="assets/img/kop.jpg" alt="assets/img/kop.png">
    <div style="text-align:center"><b>
            <p> <b> SURAT PERNYATAAN WALI MURID</b></p>
    </div><br>
    yang bertanda tangan dibawah ini :
    <table border="0" cellspacing="5" cellpading="10">
        <tr>
            <td width="150">
                Nama <br>
                Tempat, Tanggal lahir<br>
                Alamat<br>
                No. Hp<br>
                Wali Murid dari<br>
                Tempat, Tanggal lahir<br>
                Alamat<br>
                Hubungan keluarga<br>
            </td>

            <td width="500">
                : {{ $nama_ayah }}<br>
                : {{ $tempatlahir_ayah }}, {{ $tanggallahir_ayah }}<br>
                : {{ $desa }}, {{ $kecamatan }}, {{ $kota }}<br>
                : {{ $no_hp }}<br>
                : {{ $nama_lengkap }} <br>
                : {{ $tempat_lahir }}, {{ $tanggal_lahir }}<br>
                : {{ $desa }}, {{ $kecamatan }}, {{ $kota }}<br>
                : {{ $status_keluarga }}
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <p>
                    Menyatakan bahwa kami :
                <ol type="1" start="1">
                    <li>Menyerahkan anak kami sepenuhnya kepada pihak MTs. Miftahul Ulum 2 Banyuputih Kidul Jatiroto
                        Lumajang untuk mendidik dan mengawasi menurut ajaran agama Islam Ahlus Sunnah wal Jama'ah dan
                        hukum
                        negara Republik Indonesia;</li>
                    <li>Menerima atas segala sanksi yang diberikan oleh kepala madrasah kepada anak kami, jika anak
                        kami melakukan pelanggaran terhadap tata tertib madrasah;</li>
                    <li>Menerima dengan hati legawa atas pengembalian anak kami jika anak kami sudah tidak sanggup
                        untuk mentaati tata tertib atau melampaui poin pelanggaran yang telah ditetapkan oleh madrasah;
                    </li>
                    <li>Siap mengajukan permohonan pengunduran diri anak kami kepada pihak Madrasah jika anak kami
                        bermasalah di madrasah dan kemudian anak kami dikeluarkan dari madrasah;</li>
                    <li>Siap menghadap pada pengasuh, pengurus, kepala lembaga jika kami dipanggil ke madrasah yang
                        berkaitan dengan anak kami;</li>
                    <li>Bertanggungjawab atas biaya administrasi anak kami di madrasah;</li>
                    <li>Menyelesaikan secara kekeluargaan atas kemungkinan terjadinya konflik anak kami dengan
                        keluarga besar madrasah;</li>
                    <li>Sanggup menjaga nama baik almamater madrasah dan pesantren;</li>
                    <li>Memintakan izin anak kami kepada pengasuh dan pengurus madrasah pada saat pulang atau boyong;
                    </li>
                    <li> Sanggup dan siap ikut serta dalam mendidik dan mengawasi anak kami ketika berada di rumah;
                    </li>
                    <li> Sanggup memenuhi persyaratan yang ditentukan madrasah dan lembaga;</li>
                    <li> Tidak memperbolehkan merokok kepada anak kami.</li>

                    <br>
                    <li>ikian surat pernyataan ini kami buat dengan sebenarnya.</li>
                    </p>
            </td>
        </tr>
    </table>
    <table style="margin-top: 10px">
        <tr>
            <td align="left" valign="top">
                <br>
                Kepala MTS Miftahul Ulum 2
                <br>
                <br>
                <br><br><br>
                <br>
                <b> SAHRONI, S.PdI., M.Pd</b>
            </td>
            <td align="left" width="150" height="105">
            </td>
            <td align="left" valign="top">
                Lumajang, <?= date('d M Y') ?> <br>
                Orang tua / Wali Santri 
               <br>
               <br>
               <br><br><br>
               <br>
                {{ $nama_ayah }}
            </td>
        </tr>
    </table>
</body></html>
