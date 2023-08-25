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
    <link rel="stylesheet" href="{{ public_path('/css/ctk-batal.css') }}">

    <title>Pembatalan Meninggal Dunia</title>
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
                <td> B-<span class="ml-5">&nbsp; /Kk.10.10/V/Hj.04/{{ $pembatalan->bulanangka }}/{{ $pembatalan->tahun }}</span></td>
                <td style="text-align: right;" class="mr-0">{{ $pembatalan->bulanproses }} {{ $pembatalan->tahun }}</td>
              </tr>
              <tr>
                <td style="width:80px;">Sifat </td>
                <td>: </td>
                <td> Penting</td>
              </tr>
              <tr>
                <td style="width:80px;">Lampiran </td>
                <td>: </td>
                <td> 1 (satu) Berkas</td>
              </tr>
              <tr>
                <td style="width:80px;">Perihal </td>
                <td>: </td>
                <td> Permohonan Pembatalan dan Pengembalian Setoran {{ $pembatalan->setoran }} BPIH</td>
              </tr>
              <tr>
                <td style="width:80px;"> </td>
                <td> </td>
                <td> &nbsp;Atas Nama {{ $pembatalan->namajamaah }} Bin {{ $pembatalan->bin }}</td>
              </tr>
            </table>
          </div>
        </div>
  
        {{-- Tujuan Surat --}}
        <div class="mt-2">
          <p>Kepada Yth.<br>Bapak Dirjen Penyelenggaraan Haji dan Umrah<br>Kementerian Agama RI<br>Cq. Subdit Pendaftaran Haji<br>Jl. Lapangan Banteng Barat No. 3–4 Jakarta</p>
        </div>
  
        {{-- Isi Surat --}}
        <div>
          <p style="margin-bottom: -2px;"><i>Assalamu'alaikum Wr. Wb.</i></p>
          <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disampaikan dengan hormat, kami teruskan permohonan pembatalan dan pengembalian setoran {{ $pembatalan->setoran }} BPIH jamaah calon haji dengan identitas sebagai berikut :</p>
        </div>
  
        <div class="ml-3" style="margin-top: -15px;">
          <table width=100%>
            <tr>
              <td style="width: 150px;">Nama </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;" colspan="3"><b>{{ $pembatalan->namajamaah }}</b></td>
            </tr>
            <tr>
              <td style="width: 150px;">Bin/Binti </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;" colspan="3">{{ $pembatalan->bin }}</td>
            </tr>
            <tr>
              <td style="width: 150px;">Nomor Porsi </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;" colspan="3">{{ $pembatalan->porsi }}</td>
            </tr>
            <tr>
              <td style="width: 150px;">Jenis Kelamin </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;" colspan="3">{{ $pembatalan->jeniskelamin }}</td>
            </tr>
            <tr>
              <td style="width: 150px;">Alamat </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;" colspan="3">{{ $pembatalan->alamatjamaah }}</td>
            </tr>
            <tr>
              <td style="width: 150px;"> </td>
              <td style="width: 10px;text-align:left;"> </td>
              <td style="text-align:left;" colspan="3">Kec. {{ $pembatalan->kecjamaah }} Kab. Majalengka</td>
            </tr>
            <tr>
              <td style="width: 150px;">Tanda Bukti BPIH </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;" colspan="3">{{ $pembatalan->bankjamaah }} KCP Majalengka</td>
            </tr>
            <tr>
              <td style="width: 150px;"> </td>
              <td style="width: 10px;text-align:left;"> </td>
              <td style="text-align:left;width: 170px;">Jumlah Pembayaran</td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">Rp. {{ $pembatalan->uang }},-</td>
            </tr>
            <tr>
              <td style="width: 150px;"> </td>
              <td style="width: 10px;text-align:left;"> </td>
              <td style="text-align:left;width: 170px;">Tanggal Pembayaran</td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">{{ $pembatalan->spph }}</td>
            </tr>
            <tr>
              <td style="width: 150px;"> </td>
              <td style="width: 10px;text-align:left;"> </td>
              <td style="text-align:left;width: 170px;">No. Rekening</td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">{{ $pembatalan->norekjamaah }}</td>
            </tr>
          </table>
        </div>
  
        <div>
          <p style="text-align: justify; margin-bottom: -2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selanjutnya bersama ini kami mohon perkenannya untuk diproses pengembalian setoran {{ $pembatalan->setoran }} BPIH dimaksud sesuai dengan ketentuan yang berlaku.</p>
          <p style="text-align: justify; margin-bottom: -2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian, atas perkenannya dihaturkan terimakasih.</p>
          <p><i>Wassalamu'alaikum Wr. Wb.</i></p>
        </div>
  
        <div style="margin-left: 400px; margin-top:-20px;">
          <p style="margin-bottom: -5px">a.n. Kepala</p>
          <p class="ml-4">&nbsp;&nbsp;{{ $pembatalan->pejabat->jabatan }},<br><br><br><span>&nbsp;&nbsp;<b>{{ $pembatalan->pejabat->namapejabat }}</b></span></p>
        </div>
  
        <div style="margin-top: -15px;">
          <p style="font-size: 11pt;">Tembusan :<br>
             1. Yth. Kepala Kantor Wilayah Kementerian Agama Prov. Jawa Barat<br>
             2. Yth. Kepala Kantor Kementerian Agama Kab. Majalengka<br>
             3. Yth. Pimpinan BPS BPIH {{ $pembatalan->bankjamaah }} KCP Majalengka</p>
        </div>
        {{-- Akhir Isi Surat --}}
      </div>
    </section>
    {{-- AKHIR HALAMAN 1 --}}

    {{-- HALAMAN 2 : SURAT PERMOHONAN dari JAMAAH --}}
    <section id="hal2">
      <div class="page-break">
        <div class="row" style="margin-top: -15px;">
          <div class="col-sm">
            <p style="text-align: right;" class="mr-4">Majalengka, &nbsp;&nbsp; {{ $pembatalan->bulanproses }} {{ $pembatalan->tahun }}</p>
          </div>
        </div>

        <div class="row" style="margin-top: -15px;">
          <div class="col">
            <table width=95% style="margin: 0">
              <tr>
                <td style="width:70px;">Perihal </td>
                <td>: </td>
                <td> Permohonan Pembatalan dan Pengembalian BPIH</td>
              </tr>
              <tr>
                <td style="width:70px;"> </td>
                <td> </td>
                <td> Jamaah Calon Haji</td>
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
              <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini, saya ahli waris jamaah calon haji Kabupaten Majalengka dengan keterangan sebagai berikut :</p>
          </div>
        </div>

        <div class="ml-3" style="margin-top: -15px;">
          <table width=100%>
            <tr>
              <td style="width: 150px;">Nama </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;" colspan="3"><b>{{ $pembatalan->namajamaah }}</b></td>
            </tr>
            <tr>
              <td style="width: 150px;">Bin/Binti </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;" colspan="3">{{ $pembatalan->bin }}</td>
            </tr>
            <tr>
              <td style="width: 150px;">Nomor Porsi </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;" colspan="3">{{ $pembatalan->porsi }}</td>
            </tr>
            <tr>
              <td style="width: 150px;">Jenis Kelamin </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;" colspan="3">{{ $pembatalan->jeniskelamin }}</td>
            </tr>
            <tr>
              <td style="width: 150px;">Alamat </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;" colspan="3">{{ $pembatalan->alamatjamaah }}</td>
            </tr>
            <tr>
              <td style="width: 150px;"> </td>
              <td style="width: 10px;text-align:left;"> </td>
              <td style="text-align:left;" colspan="3">Kec. {{ $pembatalan->kecjamaah }} Kab. Majalengka</td>
            </tr>
            <tr>
              <td style="width: 150px;">Tanda Bukti BPIH </td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;" colspan="3">{{ $pembatalan->bankjamaah }} KCP Majalengka</td>
            </tr>
            <tr>
              <td style="width: 150px;"> </td>
              <td style="width: 10px;text-align:left;"> </td>
              <td style="text-align:left;width: 170px;">Jumlah Pembayaran</td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">Rp. {{ $pembatalan->uang }},-</td>
            </tr>
            <tr>
              <td style="width: 150px;"> </td>
              <td style="width: 10px;text-align:left;"> </td>
              <td style="text-align:left;width: 170px;">Tanggal Pembayaran</td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">{{ $pembatalan->spph }}</td>
            </tr>
            <tr>
              <td style="width: 150px;"> </td>
              <td style="width: 10px;text-align:left;"> </td>
              <td style="text-align:left;width: 170px;">No. Rekening</td>
              <td style="width: 10px;text-align:left;">:</td>
              <td style="text-align:left;">{{ $pembatalan->norekjamaah }}</td>
            </tr>
          </table>
        </div>

        <div class="row mt-2 mr-2">
          <div class="col">
            <p style="text-align: justify;margin-bottom: -2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menyatakan mengajukan pengembalian BPIH {{ $pembatalan->setoran }} dikarenakan <b>Meninggal Dunia</b>.</p>
            <p style="text-align: justify;margin-bottom: -2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian, selanjutnya mohon pertimbangan dan mendapatkan penyelesaian sebagaimana mestinya.</p>
            <p><i>Wassalamu'alaikum Wr. Wb.</i></p>
          </div>
        </div>

        <div style="margin-left: 400px; margin-top: -20px;">
          <p style="margin-bottom: 40px;">Pemohon,</p>
          <p style="font-size: 8pt;margin-bottom: 40px;">materai 10.000</p>
          <p><b>{{ $pembatalan->namawaris }}</b></p>
        </div>

        <div style="margin-top: -15px;">
          <p style="font-size: 11pt;">Surat Permohonan ini dilampiri :<br>
             1. BPIH/SPPH Asli<br>
             2. Buku Tabungan<br>
             3. KTP Almarhum dan KTP Ahli Waris<br>
             4. Kartu Keluarga<br>
             5. Surat Kematian dari Desa<br>
             6. Surat Keterangan Ahli Waris dari Kepala Desa diketahui Camat<br>
             7. Surat Kuasa Ahli Waris dari Kepala Desa<br>
             8. Surat pernyataan tanggungjawab mutlak dari ahli waris/kuasa waris jamaah haji bermaterai
            </p>
        </div>
      </div>
    </section>
    {{-- AKHIR HALAMAN 2 --}}

    {{-- HALAMAN 3 : SURAT TANGGUNGJAWAB MUTLAK --}}
    <section id="hal3">
      <div class="row">
        <div class="col mr-2">
          <p class="text-center mb-4"><b>SURAT PERNYATAAN TANGGUNGJAWAB MUTLAK</b></p>
          <p>Yang bertanda tangan di bawah ini, saya :</p>
          <div style="margin-top: -15px;">
            <table width=100%>
              <tr>
                <td style="width: 160px;">Nama </td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;"><b>{{ $pembatalan->namawaris }}</b></td>
              </tr>
              <tr>
                <td style="width: 160px;">Nomor KTP </td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;">{{ $pembatalan->ktp }}</td>
              </tr>
              <tr>
                <td style="width: 160px;">Nomor HP </td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;">{{ $pembatalan->nohp }}</td>
              </tr>
              <tr>
                <td style="width: 160px;">Alamat </td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;">{{ $pembatalan->alamatwaris }}</td>
              </tr>
              <tr>
                <td style="width: 160px;"> </td>
                <td style="width: 10px;text-align:left;"> </td>
                <td style="text-align:left;">Kec. {{ $pembatalan->kecwaris }} Kab./Kota {{ $pembatalan->kabwaris }}</td>
              </tr>
              <tr>
                <td style="width: 160px;">Hubungan dgn alm</td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;">{{ $pembatalan->hubungan }}</td>
              </tr>
            </table>
          </div>

          <p class="mt-4">Adalah Kuasa ahli waris jamaah calon haji dengan identitas :</p>
          <div style="margin-top: -15px;">
            <table width=100%>
              <tr>
                <td style="width: 160px;">Nomor Porsi </td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;">{{ $pembatalan->porsi }}</td>
              </tr>
              <tr>
                <td style="width: 160px;">Nama </td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;"><b>{{ $pembatalan->namajamaah }}</b></td>
              </tr>
              <tr>
                <td style="width: 160px;">Ayah Kandung </td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;">{{ $pembatalan->bin }}</td>
              </tr>
              <tr>
                <td style="width: 160px;">Alamat </td>
                <td style="width: 10px;text-align:left;">:</td>
                <td style="text-align:left;">{{ $pembatalan->alamatjamaah }}</td>
              </tr>
              <tr>
                <td style="width: 160px;"> </td>
                <td style="width: 10px;text-align:left;"> </td>
                <td style="text-align:left;">Kec. {{ $pembatalan->kecjamaah }} Kab. Majalengka</td>
              </tr>
            </table>
          </div>

          <p class="mt-4 mr-4" style="text-align: justify;">Bertanggungjawab mutlak untuk mengurus proses pembatalan dan pengembalian BPIH setoran {{ $pembatalan->setoran }} dimaksud sesuai dengan ketentuan yang berlaku.</p>
          <p>Demikian surat pernyataan ini saya buat, untuk dipergunakan sebagaimana mestinya.</p>

          <div class="mt-5" style="margin-left: 400px;">
            <p>Majalengka, &nbsp;&nbsp;&nbsp; {{ $pembatalan->bulanproses }} {{ $pembatalan->tahun }}</p>
            <p style="margin-bottom: 40px;margin-top:-20px;">Yang membuat pernyataan,</p>
            <p style="font-size: 8pt;margin-bottom: 40px;">materai 10.000</p>
            <p><b>{{ $pembatalan->namawaris }}</b></p>
          </div>

        </div>
      </div>
    </section>
    {{-- AKHIR HALAMAN 3 --}}

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>