<?php 
    $blnAngka;
    if ($pelimpahan->bulanproses == "Januari") {$blnAngka = "01";}
    elseif ($pelimpahan->bulanproses == "Februari") {$blnAngka = "02";}
    elseif ($pelimpahan->bulanproses == "Maret") {$blnAngka = "03";}
    elseif ($pelimpahan->bulanproses == "April") {$blnAngka = "04";}
    elseif ($pelimpahan->bulanproses == "Mei") {$blnAngka = "05";}
    elseif ($pelimpahan->bulanproses == "Juni") {$blnAngka = "06";}
    elseif ($pelimpahan->bulanproses == "Juli") {$blnAngka = "07";}
    elseif ($pelimpahan->bulanproses == "Agustus") {$blnAngka = "08";}
    elseif ($pelimpahan->bulanproses == "September") {$blnAngka = "09";}
    elseif ($pelimpahan->bulanproses == "Oktober") {$blnAngka = "10";}
    elseif ($pelimpahan->bulanproses == "Nopember") {$blnAngka = "11";}
    elseif ($pelimpahan->bulanproses == "Desember") {$blnAngka = "12";}

    $tgllahir = Carbon\Carbon::parse($pelimpahan->tgllahir)->translatedFormat('d');
    $blnlahir = Carbon\Carbon::parse($pelimpahan->tgllahir)->translatedFormat('m');
    $thnlahir = Carbon\Carbon::parse($pelimpahan->tgllahir)->translatedFormat('Y');
    $tglba = Carbon\Carbon::parse($pelimpahan->tglberitaacara)->translatedFormat('d');
    $thnba = Carbon\Carbon::parse($pelimpahan->tglberitaacara)->translatedFormat('Y');
    $tglpermohonan = Carbon\Carbon::parse($pelimpahan->tglsuratpermohonan)->translatedFormat('d');
    $thnpermohonan = Carbon\Carbon::parse($pelimpahan->tglsuratpermohonan)->translatedFormat('Y');

    $kelamin;
    if ($pelimpahan->jeniskelamin === "Laki-laki") {
      $kelamin = 1;
    }else{$kelamin = 2;}

    // Function TERBILANG
    function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    {{-- CSSku --}}
    <link rel="stylesheet" href="{{ public_path('/css/ctk-pelimpahan.css') }}">

    <title>Pelimpahan Sakit Permanen</title>
  </head>
  <body>

    {{-- HALAMAN 1 : SURAT PERMOHONAN ke DIRJEN --}}
    <section id="hal1">
      <div class="page-break">
        {{-- Kop Surat --}}
        <table style="border:0">
          <tr>
            <td>
              <img src="{{ public_path('/img/newlogo.jpg') }}" style="width: 90px;" alt="Logo Kemenag">
            </td>
            <td style="width: 600px;">
              <h5 class="text-center" style="margin-bottom: -1px;"><b>KEMENTERIAN AGAMA REPUBLIK INDONESIA</b></h5>
              <h6 class="text-center" style="margin-bottom: -5px;"><b>KANTOR KEMENTERIAN AGAMA KABUPATEN MAJALENGKA</b></h6>
              <p class="text-center" style="margin-bottom: -5px;font-size: 11pt;">Jalan Siti Armilah Nomor 1 Majalengka 45418</p>
              <p class="text-center" style="margin-bottom: -5px;font-size: 11pt;">Telepon (0233) 281222, 281023, 281583, 283075 Fax. (0233) 281222</p>
              <p class="text-center" style="font-size: 11pt;">e-mail : kabmajalengka@kemenag.go.id</p>
            </td>
          </tr>
        </table>
        <hr style="margin-top: -10px; margin-bottom: -1px; border:1px solid black;">
        {{-- Akhir Kop Surat --}}
  
        {{-- Nomor Surat --}}
        <div class="row">
          <div class="col">
            <table width=95% style="margin: 0">
              <tr>
                <td style="width:80px;">Nomor </td>
                <td>: </td>
                <td> B-<span class="ml-5">&nbsp; /</span>Kk.10.10/V/Hj.00/<?= $blnAngka; ?>/{{ $pelimpahan->tahun->tahun }}</td>
                <td style="text-align: right;" class="mr-0">{{ $pelimpahan->bulanproses }} {{ $pelimpahan->tahun->tahun }}</td>
              </tr>
              <tr>
                <td style="width:80px;">Sifat </td>
                <td>: </td>
                <td> Biasa</td>
              </tr>
              <tr>
                <td style="width:80px;">Lampiran </td>
                <td>: </td>
                <td> 1 (satu) Berkas</td>
              </tr>
              <tr>
                <td style="width:80px;">Perihal </td>
                <td>: </td>
                <td> <b>Rekomendasi Pelimpahan Porsi Haji</b></td>
              </tr>
            </table>
          </div>
        </div>
  
        {{-- Tujuan Surat --}}
        <div class="mt-3">
          <p>Kepada Yth.<br>Kepala Kantor Wilayah Kemenerian Agama<br>Provinsi Jawa Barat<br>Cq. Kepala Bidang Penyelenggaraan Haji dan Umrah<br>di Bandung</p>
        </div>
  
        {{-- Isi Surat --}}
        <div>
          <p style="margin-bottom: -2px;"><i>Assalamu'alaikum Wr. Wb.</i></p>
          <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bersama ini kami sampaikan, sehubungan dengan adanya Calon Jemaah Haji Kabupaten Majalengka yang sakit permanen, maka dengan ini kami memberi rekomendasi pelimpahan porsi haji :</p>
        </div>
  
        <div class="ml-3" style="margin-top: -15px;">
            <table width=100%>
                <tr>
                    <td style="width: 150px;">Nomor Porsi </td>
                    <td style="width: 10px;text-align:left;">:</td>
                    <td style="text-align:left;">{{ $pelimpahan->porsi }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Nama </td>
                    <td style="width: 10px;text-align:left;">:</td>
                    <td style="text-align:left;"><b>{{ $pelimpahan->namajamaah }}</b></td>
                </tr>
                <tr>
                    <td style="width: 150px;">Bin/Binti </td>
                    <td style="width: 10px;text-align:left;">:</td>
                    <td style="text-align:left;">{{ $pelimpahan->binjamaah }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Tgl. Suket Dokter </td>
                    <td style="width: 10px;text-align:left;">:</td>
                    <td style="text-align:left;">{{ $pelimpahan->tglsurat }}</td>
                </tr>
            </table>
            <p style="margin-bottom: -2px;">Dilimpahkan porsi hajinya kepada :</p>
            <table width=100%>
                <tr>
                    <td style="width: 150px;">Nama </td>
                    <td style="width: 10px;text-align:left;">:</td>
                    <td style="text-align:left;"><b>{{ $pelimpahan->namapenerima }}</b></td>
                </tr>
                <tr>
                    <td style="width: 150px;">Bin/Binti </td>
                    <td style="width: 10px;text-align:left;">:</td>
                    <td style="text-align:left;">{{ $pelimpahan->binpenerima }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Tempat/Tgl. Lahir </td>
                    <td style="width: 10px;text-align:left;">:</td>
                    <td style="text-align:left;">{{ $pelimpahan->tmplahir }}, {{ Carbon\Carbon::parse($pelimpahan->tgllahir)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Alamat </td>
                    <td style="width: 10px;text-align:left;">:</td>
                    <td style="text-align:left;">{{ $pelimpahan->alamat }} Rt {{ $pelimpahan->rt }} Rw {{ $pelimpahan->rw }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;"> </td>
                    <td style="width: 10px;text-align:left;"> </td>
                    <td>Desa/Kel. {{ $pelimpahan->desa }} Kec. {{ $pelimpahan->kec }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;"> </td>
                    <td style="width: 10px;text-align:left;"> </td>
                    <td>Kab./Kota {{ $pelimpahan->kab }} Prov. {{ $pelimpahan->prov }}</td>
                </tr>
                <tr>
                    <td style="width: 150px;">Hubungan </td>
                    <td style="width: 10px;text-align:left;">:</td>
                    <td style="text-align:left;">{{ $pelimpahan->hubungan }}</td>
                </tr>
            </table>
        </div>
  
        <div>
          <p style="text-align: justify; margin-bottom: -2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian, atas perhatiannya kami sampaikan terima kasih.</p>
          <p><i>Wassalamu'alaikum Wr. Wb.</i></p>
        </div>
  
        <div style="margin-left: 400px; margin-top:-20px;">
          <p style="margin-bottom: -5px">a.n. Kepala</p>
          <p class="ml-4">&nbsp;&nbsp;{{ $pelimpahan->pejabat->jabatan }},<br><br><br><span>&nbsp;&nbsp;<b>{{ $pelimpahan->pejabat->namapejabat }}</b></span></p>
        </div>
  
        <div style="margin-top: -15px;">
            <p style="font-size: 11pt;">Tembusan :<br>
                Yth. Kepala Kantor Kementerian Agama Kab. Majalengka (sebagai laporan)</p>
        </div>
        {{-- Akhir Isi Surat --}}
      </div>
    </section>
    {{-- AKHIR HALAMAN 1 --}}

    {{-- HALAMAN 2 : FORMULIR --}}
    <section id="hal2">
        <div class="page-break">
          {{-- Kop Surat --}}
          <table style="border:0;margin-bottom:5px;">
              <tr>
              <td>
                  <img src="{{ public_path('/img/newlogo.jpg') }}" style="width: 50px;" alt="Logo Kemenag">
              </td>
              <td style="width: 600px;">
                  <p class="text-center" style="margin-bottom: -5px;font-size: 11pt;"><b>FORMULIR PENGAJUAN PELIMPAHAN NOMOR PORSI HAJI SAKIT PERMANEN</b></p>
                  <p class="text-center" style="margin-bottom: -5px;font-size: 11pt;"><b>KEMENTERIAN AGAMA KABUPATEN MAJALENGKA</b></p>
                  <p class="text-center" style="font-size: 11pt;"><b>TAHUN {{ $pelimpahan->tahun->hijriah }} H / {{ $pelimpahan->tahun->tahun }} M</b></p>
              </td>
              </tr>
          </table>

          <div class="row">
            <div class="col-md subjudul1">
              <div class="subjudul">Nomor Porsi</div>
              <div class="subjudul">Nama Jamaah</div>
              <div class="subjudul">Sebab Pelimpahan</div>
              <div class="subjudul">Tanggal Suket Dokter</div>
              <div class="subjudul">Hubungan dengan Jamaah</div>
              <div class="subjudul">Nomor NIK Pengganti</div>
              <div class="subjudul">Nama Lengkap Pengganti</div>
              <div class="subjudul">Nama Ayah Pengganti</div>
              <div class="subjudul">Tempat/Tgl. Lahir Pengganti</div>
              <div class="subjudul">Jenis Kelamin</div>
              <div class="subjudul">Kewarganegaraan</div>
              <div class="subjudul">Pekerjaan</div>
              <div class="subjudul" style="margin-top: 66px;">Pendidikan</div>
              <div class="subjudul">Status Haji</div>
              <div class="subjudul">Golongan Darah</div>
              <div class="subjudul">Status Perkawinan</div>
              <div class="subjudul">Alamat Rumah</div>
              <div class="subjudul" style="margin-top: 32px;">Desa/Kelurahan</div>
              <div class="subjudul">Kecamatan</div>
              <div class="subjudul">Kabupaten</div>
              <div class="subjudul">Provinsi</div>
              <div class="subjudul">Bank Pengganti</div>
              <div class="subjudul">Nomor Rekening</div>
              <div class="subjudul">Nomor Telepon</div>
            </div>
            <div class="col-md tandapetik1">
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik" style="margin-top: 66px;">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik" style="margin-top: 32px;">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
              <div class="tandapetik">:</div>
            </div>
            {{-- Kotak Porsi --}}
            <div class="col-md kotak1">
              <div class="baris">
                <?php for ($i=0; $i < 10; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->porsi, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak Nama --}}
            <div class="col-md kotak1" style="top:170px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->namajamaah, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak Sebab Pelimpahan --}}
            <div class="col-md kotak1" style="top:200px;">
                <div class="baris">
                  <div class="kotak">2</div>
                  <div class="teks-baris ml-2">1. Meninggal</div>
                  <div class="teks-baris ml-2">2. Sakit Permanen</div>
                </div>
            </div>
            {{-- kotak Tanggal Kematian --}}
            <div class="col-md kotak1" style="top:228px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->tglsurat, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak Hubungan Keluarga --}}
            <div class="col-md kotak1" style="top:255px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->hubungan, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak NIK Penerima --}}
            <div class="col-md kotak1" style="top:282px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->ktppenerima, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak Nama Penerima --}}
            <div class="col-md kotak1" style="top:310px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->namapenerima, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak Bin Penerima --}}
            <div class="col-md kotak1" style="top:338px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->binpenerima, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak TTL --}}
            <div class="col-md kotak1" style="top:366px;">
              <div class="baris">
                {{-- tmplahir --}}
                <?php for ($i=0; $i < 12; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->tmplahir, $i, 1); ?></div>
                <?php } ?>

                <div class="teks-baris ml-2"> / </div>
                
                {{-- tgllahir --}}
                <div class="teks-baris ml-2 mr-2">
                  <?php for ($i=0; $i < 2; $i++) { ?>
                    <div class="kotak"><?= substr($tgllahir, $i, 1); ?></div>
                  <?php } ?>
                </div>
                <div class="teks-baris ml-2 mr-2">
                  <?php for ($i=0; $i < 2; $i++) { ?>
                    <div class="kotak"><?= substr($blnlahir, $i, 1); ?></div>
                  <?php } ?>
                </div>
                <div class="teks-baris ml-2">
                  <?php for ($i=0; $i < 4; $i++) { ?>
                    <div class="kotak"><?= substr($thnlahir, $i, 1); ?></div>
                  <?php } ?>
                </div>
              </div>
            </div>
            {{-- kotak Jenis Kelamin --}}
            <div class="col-md kotak1" style="top:394px;">
              <div class="baris">
                <div class="kotak"><?= $kelamin; ?></div>
                <div class="teks-baris ml-2">1. Pria</div>
                <div class="teks-baris ml-2">2. Wanita</div>
              </div>
            </div>
            {{-- kotak Kewarganegaraan --}}
            <div class="col-md kotak1" style="top:422px;">
              <div class="baris">
                <div class="kotak">1</div>
                <div class="teks-baris ml-2">1. Indonesia</div>
                <div class="teks-baris ml-2">2. Asing</div>
              </div>
            </div>
            {{-- kotak Pekerjaan --}}
            <div class="col-md kotak1" style="top:450px;">
              <div class="baris">
                <div class="kotak"><?= substr($pelimpahan->pekerjaan, 0, 2); ?></div>
                <div class="teks-baris ml-2">1. PNS</div>
                <div class="teks-baris ml-2">2. TNI/Polri</div>
                <div class="teks-baris ml-2">3. Dagang</div>
                <div class="teks-baris ml-2">4. Tani/Nelayan</div>
                <div class="teks-baris ml-2">5. Swasta</div>
                <div class="teks-baris ml-4">6. Ibu Rumah Tangga</div>
                <div class="teks-baris ml-2">7. Pelajar/Mahasiswa</div>
                <div class="teks-baris ml-2">8. BUMN/BUMD</div>
                <div class="teks-baris ml-4">9. Pensiunan</div>
                <div class="teks-baris ml-2">10. Lain-lain</div>
              </div>
            </div>
            {{-- kotak Pendidikan --}}
            <div class="col-md kotak1" style="top:532px;">
              <div class="baris">
                <div class="kotak"><?= substr($pelimpahan->pendidikan, 0, 1); ?></div>
                <div class="teks-baris ml-2">1. SD</div>
                <div class="teks-baris ml-2">2. SLTP</div>
                <div class="teks-baris ml-2">3. SLTA</div>
                <div class="teks-baris ml-2">4. D1/D2/D3/SM</div>
                <div class="teks-baris ml-2">5. S1</div>
                <div class="teks-baris ml-2">6. S2</div>
                <div class="teks-baris ml-2">7. S3</div>
              </div>
            </div>
            {{-- kotak Status Haji --}}
            <div class="col-md kotak1" style="top:560px;">
              <div class="baris">
                <div class="kotak"><?= substr($pelimpahan->shaji, 0, 1); ?></div>
                <div class="teks-baris ml-2">1. Sudah</div>
                <div class="teks-baris ml-2">2. Belum</div>
              </div>
            </div>
            {{-- kotak Golongan Darah --}}
            <div class="col-md kotak1" style="top:588px;">
              <div class="baris">
                <div class="kotak"><?= substr($pelimpahan->goldarah, 0, 1); ?></div>
                <div class="teks-baris ml-2">1. A</div>
                <div class="teks-baris ml-2">2. B</div>
                <div class="teks-baris ml-2">3. AB</div>
                <div class="teks-baris ml-2">4. O</div>
              </div>
            </div>
            {{-- kotak Status Perkawinan --}}
            <div class="col-md kotak1" style="top:615px;">
              <div class="baris">
                <div class="kotak"><?= substr($pelimpahan->skawin, 0, 1); ?></div>
                <div class="teks-baris ml-2">1. Belum Menikah</div>
                <div class="teks-baris ml-2">2. Menikah</div>
                <div class="teks-baris ml-2">3. Duda</div>
                <div class="teks-baris ml-2">4. Janda</div>
              </div>
            </div>
            {{-- kotak Alamat --}}
            <div class="col-md kotak1" style="top:643px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->alamat, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak RT dan RW --}}
            <div class="col-md kotak1" style="top:670px;">
              <div class="baris">
                <div class="teks-baris ml-2">No.</div>
                <div class="teks-baris ml-2">
                  <?php for ($i=0; $i < 3; $i++) { ?>
                    <div class="kotak"></div>
                  <?php } ?>
                </div>
                <div class="teks-baris ml-2">RT</div>
                <div class="teks-baris ml-2">
                  <?php for ($i=0; $i < 3; $i++) { ?>
                    <div class="kotak"><?= substr($pelimpahan->rt, $i, 1); ?></div>
                  <?php } ?>
                </div>
                <div class="teks-baris ml-2">RW</div>
                <div class="teks-baris ml-2">
                  <?php for ($i=0; $i < 3; $i++) { ?>
                    <div class="kotak"><?= substr($pelimpahan->rw, $i, 1); ?></div>
                  <?php } ?>
                </div>
              </div>
            </div>
            {{-- kotak Desa --}}
            <div class="col-md kotak1" style="top:698px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->desa, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak Kecamatan --}}
            <div class="col-md kotak1" style="top:726px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->kec, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak Kabupaten --}}
            <div class="col-md kotak1" style="top:754px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->kab, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak Provinsi --}}
            <div class="col-md kotak1" style="top:782px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->prov, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak Nama Bank Ahli Waris --}}
            <div class="col-md kotak1" style="top:810px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->bank, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak Nomor Rekening Ahli Waris --}}
            <div class="col-md kotak1" style="top:838px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->norek, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
            {{-- kotak HP Ahli Waris Penerima --}}
            <div class="col-md kotak1" style="top:866px;">
              <div class="baris">
                <?php for ($i=0; $i < 23; $i++) { ?>
                  <div class="kotak"><?= substr($pelimpahan->hppenerima, $i, 1); ?></div>
                <?php } ?>
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col">
              <table>
                <tr>
                  <td style="width: 450px;">Mengetahui</td>
                  <td>Majalengka, {{ Carbon\Carbon::parse($pelimpahan->tglberitaacara)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                  <td style="width: 450px;">Petugas Kemenag Kab/Kota,</td>
                  <td>Jemaah,</td>
                </tr>
                <tr>
                  <td><br><br><br><b>{{ $pelimpahan->verifikator->namapetugas }}</b></td>
                  <td><br><br><br><b>{{ $pelimpahan->namapenerima }}</b></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
    </section>
    {{-- AKHIR HALAMAN 2 --}}

    {{-- HALAMAN 3 : BERITA ACARA --}}
    <section id="hal3">
      <div class="page-break">
        <div class="row">
          <div class="col">
            <div class="text-center"><b>Berita Acara</b></div>
            <div class="text-center"><b>Validasi Dokumen Pelimpahan Porsi Jemaah Haji Sakit Permanen</b></div>
          </div>
          <div class="mt-3">
            <p style="text-align: justify;">Pada hari ini {{ Carbon\Carbon::parse($pelimpahan->tglberitaacara)->translatedFormat('l') }} tanggal <?= terbilang($tglba); ?> bulan {{ Carbon\Carbon::parse($pelimpahan->tglberitaacara)->translatedFormat('F') }} tahun <?= terbilang($thnba); ?>, berdasarkan surat permohonan jemaah haji pelimpahan porsi tanggal <?= terbilang($tglpermohonan); ?> bulan {{ Carbon\Carbon::parse($pelimpahan->tglsuratpermohonan)->translatedFormat('F') }} tahun <?= terbilang($thnpermohonan); ?> telah dihadirkan di Kantor Kementerian Agama Kabupaten/Kota Majalengka pihak-pihak sebagai berikut :</p>
          </div>
  
          <table>
            <tr>
              <td style="width:100px;">Nama </td>
              <td> : </td>
              <td style="width:500px;"> <b>{{ $pelimpahan->namapenerima }}</b></td>
            </tr>
            <tr>
              <td>NIK </td>
              <td> : </td>
              <td> {{ $pelimpahan->ktppenerima }}</td>
            </tr>
            <tr>
              <td>No. Telepon </td>
              <td> : </td>
              <td> {{ $pelimpahan->hppenerima }}</td>
            </tr>
            <tr>
              <td colspan="3">Sebagai Penerima Pelimpahan Porsi.</td>
            </tr>
          </table>
          
          <table class="mt-2">
            <tr>
              <td>Selanjutnya,</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td style="width:100px;">Nama </td>
              <td> : </td>
              <td style="width:500px;"> <b>{{ $pelimpahan->namapemberi }}</b></td>
            </tr>
            <tr>
              <td>NIK </td>
              <td> : </td>
              <td> {{ $pelimpahan->ktppemberi }}</td>
            </tr>
            <tr>
              <td>No. Telepon </td>
              <td> : </td>
              <td> {{ $pelimpahan->hppemberi }}</td>
            </tr>
            <tr>
              <td colspan="3">Sebagai Pemberi Kuasa Pelimpahan Porsi.</td>
            </tr>
          </table>
  
          <p class="mt-2" style="text-align: justify;">Telah dilakukan verifikasi dokumen persyaratan pelimpahan porsi jemaah haji sakit permanen atas nama {{ $pelimpahan->namajamaah }} BIN {{ $pelimpahan->binjamaah }} nomor porsi {{ $pelimpahan->porsi }} oleh petugas Kantor Kementerian Agama Kabupaten Majalengka bahwa penerima pelimpahan porsi adalah ahli waris yang berhak menerima pelimpahan porsi sesuai dengan ketentuan yang berlaku.</p>
          <p>Demikian Berita Acara ini dibuat dengan penuh kesadaran dan tidak ada biaya yang dikeluarkan dari proses tersebut.</p>
  
          <table>
            <tr>
              <td style="width: 450px;">Petugas Kementerian Agama</td>
              <td></td>
            </tr>
            <tr>
              <td>Kabupaten Majalengka,</td>
              <td>Penerima Pelimpahan Porsi,</td>
            </tr>
            <tr>
              <td><br><br><br><b>{{ $pelimpahan->verifikator->namapetugas }}</b></td>
              <td><br><br><br><b>{{ $pelimpahan->namapenerima }}</b></td>
            </tr>
            <tr>
              <td>NIP. {{ $pelimpahan->verifikator->nippetugas }}</td>
              <td></td>
            </tr>
          </table>
          <table style="width:95%;">
            <tr>
              <td class="text-center">Mengetahui</td>
            </tr>
            <tr>
              <td class="text-center">Pemberi Kuasa,</td>
            </tr>
            <tr>
              <td class="text-center"><br><br><span class="text-muted" style="font-size: 8pt;">materai 10.000</span><br><br><b>{{ $pelimpahan->namapemberi }}</b></td>
            </tr>
          </table>
        </div>
      </div>
    </section>
    {{-- AKHIR HALAMAN 3 --}}

    {{-- HALAMAN 4 : SURAT DARI JAMAAH --}}
    <section id="hal4">
      <div class="page-break">
        <div class="row" style="margin-top: -15px;">
          <div class="col-sm">
            <p style="text-align: right;" class="mr-4">Majalengka, {{ Carbon\Carbon::parse($pelimpahan->tglsuratpermohonan)->translatedFormat('d F Y') }}</p>
          </div>
        </div>

        <div class="row" style="margin-top: -15px;">
          <div class="col">
            <table width=95% style="margin: 0">
              <tr>
                <td style="width:70px;">Perihal </td>
                <td>: </td>
                <td> Permohonan Usulan Pelimpahan Porsi Haji</td>
              </tr>
            </table>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col">
            <p>Kepada Yth.<br>Kepala Kantor Kementerian Agama<br>Kabupaten Majalengka</p>
          </div>
        </div>

        <div class="row mt-1 mr-2">
          <div class="col">
              <p style="margin-bottom: -2px;"><i>Assalamu'alaikum Wr. Wb.</i></p>
              <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bersama ini kami sampaikan, sehubungan Calon Jamaah Haji sakit permanen, maka dengan ini kami mohon pelimpahan porsi haji atas :</p>
          </div>
        </div>

        <div class="ml-3" style="margin-top: -15px;">
          <table width=100%>
            <tr>
              <td style="width: 180px;">Nama </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;"><b>{{ $pelimpahan->namajamaah }}</b></td>
            </tr>
            <tr>
              <td style="width: 180px;">Bin/Binti </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">{{ $pelimpahan->binjamaah }}</td>
            </tr>
            <tr>
              <td style="width: 180px;">Nomor Porsi </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">{{ $pelimpahan->porsi }}</td>
            </tr>
            <tr>
              <td style="width: 180px;">Tanggal Suket Dokter </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">{{ $pelimpahan->tglsurat }}</td>
            </tr>
          </table>
          <p class="mt-2">Dilimpahkan Porsi Hajinya kepada :</p>
          <table width=100%>
            <tr>
              <td style="width: 180px;">Nama </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;"><b>{{ $pelimpahan->namapenerima }}</b></td>
            </tr>
            <tr>
              <td style="width: 180px;">Bin/Binti </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">{{ $pelimpahan->binpenerima }}</td>
            </tr>
            <tr>
              <td style="width: 180px;">Tempat/Tanggal Lahir </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">{{ $pelimpahan->tmplahir }}, {{ Carbon\Carbon::parse($pelimpahan->tgllahir)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
              <td style="width: 180px;">Alamat </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">{{ $pelimpahan->alamat }} Rt {{ $pelimpahan->rt }} Rw {{ $pelimpahan->rw }}</td>
            </tr>
            <tr>
              <td style="width: 180px;"></td>
              <td style="width: 10px;text-align:left;"></td>
              <td style="text-align:left;">Desa/Kel. {{ $pelimpahan->desa }} Kec. {{ $pelimpahan->kec }}</td>
            </tr>
            <tr>
              <td style="width: 180px;"></td>
              <td style="width: 10px;text-align:left;"></td>
              <td style="text-align:left;">Kab./Kota {{ $pelimpahan->kab }} Prov. {{ $pelimpahan->prov }}</td>
            </tr>
            <tr>
              <td style="width: 180px;">Hubungan </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">{{ $pelimpahan->hubungan }}</td>
            </tr>
          </table>
          <p class="mt-2" style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian, selanjutnya mohon pertimbangan dan mendapatkan penyelesaian sebagaimana mestinya.</p>
          <p style="margin-top: -15px; margin-bottom: 25px;"><i>Wassalamu'alaikum Wr. Wb.</i></p>
        </div>

        <div style="margin-left: 400px;">
          <p style="margin-bottom: 80px;">Pemohon,</p>
          <p><b>{{ $pelimpahan->namapenerima }}</b></p>
        </div>
      </div>
    </section>
    {{-- AKHIR HALAMAN 4 --}}

    {{-- HALAMAN 5 : SURAT TANGGUNGJAWAB MUTLAK --}}
    <section id="hal5">
      <div class="row">
        <div class="col mr-2">
          <div class="text-center"><b>SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK</b></div>
          <div class="text-center"><b>PENERIMA PELIMPAHAN NOMOR PORSI JEMAAH HAJI SAKIT PERMANEN</b></div>

          <p class="mt-4">Saya yang bertanggung jawab di bawah ini :</p>
          <div style="margin-top: -15px;">
            <table width=100%>
              <tr>
                <td style="width: 180px;">Nama </td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;"><b>{{ $pelimpahan->namapenerima }}</b></td>
              </tr>
              <tr>
                <td style="width: 180px;">Tempat/Tanggal Lahir </td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;">{{ $pelimpahan->tmplahir }}, {{ Carbon\Carbon::parse($pelimpahan->tgllahir)->translatedFormat('d F Y') }}</td>
              </tr>
              <tr>
                <td style="width: 180px;">Jenis Kelamin </td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;">{{ $pelimpahan->jeniskelamin }}</td>
              </tr>
              <tr>
                <td style="width: 180px;">Alamat </td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;">{{ $pelimpahan->alamat }} Rt {{ $pelimpahan->rt }} Rw {{ $pelimpahan->rw }}</td>
              </tr>
              <tr>
                <td style="width: 180px;"></td>
                <td style="width: 10px;text-align:left;"></td>
                <td style="text-align:left;">Desa/Kel. {{ $pelimpahan->desa }} Kec. {{ $pelimpahan->kec }}</td>
              </tr>
              <tr>
                <td style="width: 180px;"></td>
                <td style="width: 10px;text-align:left;"></td>
                <td style="text-align:left;">Kab./Kota {{ $pelimpahan->kab }} Prov. {{ $pelimpahan->prov }}</td>
              </tr>
            </table>
          </div>

          <p class="mt-3" style="text-align: justify;">Bertanggung jawab atas pelimpahan nomor porsi jemaah haji reguler yang sakit permanen a.n. {{ $pelimpahan->namajamaah }} BIN {{ $pelimpahan->binjamaah }} sesuai dengan surat kuasa yang telah diberikan oleh para pemberi kuasa.</p>
          <p style="text-align: justify;">Apabila dikemudian hari ditemukannya data yang tidak benar atau timbul gugatan atas kuasa penerima pelimpahan nomor porsi jemaah haji sakit permanen, maka saya siap bertanggung jawab secara administratif dan/atau pidana.</p>
          <p>Demikian pernyataan ini saya buat dengan sadar, tanpa ada paksaaan dari pihak manapun.</p>

          <div class="mt-5" style="margin-left: 400px;">
            <p>Majalengka, {{ Carbon\Carbon::parse($pelimpahan->tglsuratpermohonan)->translatedFormat('d F Y') }}</p>
            <p style="margin-bottom: 40px;margin-top:-20px;">Yang membuat pernyataan,</p>
            <p style="font-size: 8pt;margin-bottom: 40px;">materai 10.000</p>
            <p><b>{{ $pelimpahan->namapenerima }}</b></p>
          </div>
        </div>
      </div>
    </section>
    {{-- AKHIR HALAMAN 5 --}}

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>