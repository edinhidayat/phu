@extends('template.awal')
@section('konten')
    {{-- TANGGAL DAN JAM --}}
    <div class="container">
        <div class="row jam">
            <div class="col-lg pt-1">
                <p class="bg-danger text-white p-2 mb-0">Tanggal : {{ date('d-m-Y') }} Jam : <span id="jam"></span></p>
            </div>
        </div>
    </div>

    {{-- CAROUSEL --}}
    <div class="row">
        <div class="col">
            <div class="container">
                <div id="carouselExampleFade" class="carousel slide carousel-fade mt-0" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://source.unsplash.com/1200x500/?education" class="d-block w-100" alt="Gambar">
                        </div>
                        <div class="carousel-item">
                            <img src="https://source.unsplash.com/1200x500/?sport" class="d-block w-100" alt="Gambar">
                        </div>
                        <div class="carousel-item">
                            <img src="https://source.unsplash.com/1200x500/?computer" class="d-block w-100" alt="Gambar">
                        </div>
                        <div class="carousel-item">
                            <img src="https://source.unsplash.com/1200x500/?mechanic" class="d-block w-100" alt="Gambar">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- JADWAL SHOLAT --}}
    <div class="container mb-3 pb-3">
        <h5 class="text-center text-white d-block bg-danger pt-2 pb-2 mb-0">~ Jadwal Sholat Kab. Majalengka ~</h5>
        <div class="row">
            <div class="col-sm">
                <div class="bg-white">
                    <h6 class="ps-3 py-2 mb-0">Hari : {{ $jadwal['tanggal'] }}</h6>
                </div>
                <div class="bg-white jadwal-sholat">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">Imsak</th>
                                <th class="text-center">Subuh</th>
                                <th class="text-center">Terbit</th>
                                <th class="text-center">Dzuhur</th>
                                <th class="text-center">Ashar</th>
                                <th class="text-center">Maghrib</th>
                                <th class="text-center">Isya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center bg-warning">{{ $jadwal['imsak'] }}</td>
                                <td class="text-center bg-warning">{{ $jadwal['subuh'] }}</td>
                                <td class="text-center bg-warning">{{ $jadwal['terbit'] }}</td>
                                <td class="text-center bg-warning">{{ $jadwal['dzuhur'] }}</td>
                                <td class="text-center bg-warning">{{ $jadwal['ashar'] }}</td>
                                <td class="text-center bg-warning">{{ $jadwal['maghrib'] }}</td>
                                <td class="text-center bg-warning">{{ $jadwal['isya'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- PELAYANAN --}}
    <div class="container mb-3 pb-3">
        <h5 class="text-center text-white d-block bg-danger pt-2 pb-2">~ Pelayanan ~</h5>
        <div class="row d-flex justify-content-center">
            <div class="col">
                <div class="pelayanan ms-4 me-4">
                    <div>
                        <div class="col ps-3 pe-3">
                            <div class="card h-100">
                                <img src="https://source.unsplash.com/400x200/?registration" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark fs-6">Pendaftaran Haji</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col ps-3 pe-3">
                            <div class="card h-100">
                                <img src="https://source.unsplash.com/400x200/?form" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark fs-6">Pembatalan Porsi</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col ps-3 pe-3">
                            <div class="card h-100">
                                <img src="https://source.unsplash.com/400x200/?computer" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark fs-6">Pelimpahan Porsi</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col ps-3 pe-3">
                            <div class="card h-100">
                                <img src="https://source.unsplash.com/400x200/?education" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark fs-6">Perbaikan Data</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col ps-3 pe-3">
                            <div class="card h-100">
                                <img src="https://source.unsplash.com/400x200/?plane" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark fs-6">Cek Keberangkatan</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pelayanan1 ms-4 me-4">
                    <div>
                        <div class="col ps-3 pe-3">
                            <div class="card h-100">
                                <img src="https://source.unsplash.com/400x200/?registration" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark fs-6">Pendaftaran Haji</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col ps-3 pe-3">
                            <div class="card h-100">
                                <img src="https://source.unsplash.com/400x200/?form" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark fs-6">Pembatalan Porsi</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col ps-3 pe-3">
                            <div class="card h-100">
                                <img src="https://source.unsplash.com/400x200/?computer" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark fs-6">Pelimpahan Porsi</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col ps-3 pe-3">
                            <div class="card h-100">
                                <img src="https://source.unsplash.com/400x200/?education" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark fs-6">Perbaikan Data</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col ps-3 pe-3">
                            <div class="card h-100">
                                <img src="https://source.unsplash.com/400x200/?plane" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark fs-6">Cek Keberangkatan</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- BERITA --}}
    {{-- <div class="container mb-3 pb-3">
        <h5 class="text-center text-white d-block bg-danger pt-2 pb-2">~ Berita ~</h5>
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3" style="max-height:600px;">
                    <img src="https://source.unsplash.com/900x400/?flower" class="card-img-top gb-berita1" alt="Berita">
                    <div class="card-body">
                        <h5 class="card-title"><b>Berita Kesatu Merupakan Berita Utama dengan Halaman Besar Sekali</b></h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 align-item-center">
                            <img src="https://source.unsplash.com/200x150/?mechanic" class="img-fluid rounded-start" alt="Berita2">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title fs-6">Berita Kedua Merupakan Berita selajutnya dengan halaman kecil</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 align-item-center">
                            <img src="https://source.unsplash.com/200x150/?farm" class="img-fluid rounded-start" alt="Berita2">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title fs-6">Berita Ketiga Merupakan Berita selajutnya dengan halaman kecil</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 align-item-center">
                            <img src="https://source.unsplash.com/200x150/?water" class="img-fluid rounded-start" alt="Berita2">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title fs-6">Berita Keempat Merupakan Berita selajutnya dengan halaman kecil</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 align-item-center">
                            <img src="https://source.unsplash.com/200x150/?city" class="img-fluid rounded-start" alt="Berita2">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title fs-6">Berita Kelima Merupakan Berita selajutnya dengan halaman kecil</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- PERSYARATAN dan INFORMASI --}}
    <div class="container mb-3 pb-3">
        <div class="row">
            <div class="col-lg-8">
                <h5 class="text-center text-white d-block bg-danger pt-2 pb-2">~ Cek Keberangkatan ~</h5>
                <div class="bg-white cek-berangkat mb-3">
                    <form action="https://haji.kemenag.go.id/sieis/Estimasi/getEstimasi/" method="post" target="_blank">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" id="nomor_porsi" name="nomor_porsi"
                                placeholder="Masukan Nomor Porsi">
                            <button class="btn btn-success" type="submit">Cari</button>
                        </div>
                    </form>
                </div>

                <h5 class="text-center text-white d-block bg-danger pt-2 pb-2">~ Persyaratan ~</h5>
                <div class="bg-white pt-3 pb-3">
                    <div class="btn-persyaratan">
                        <!-- Button Modal-->
                        <button type="button" class="btn btn-item" data-bs-toggle="modal"
                            data-bs-target="#pendaftaran">
                            Pendaftaran Haji
                        </button>
                        <button type="button" class="btn btn-item" data-bs-toggle="modal" data-bs-target="#batalwafat">
                            Pembatalan Porsi karena Wafat
                        </button>
                        <button type="button" class="btn btn-item" data-bs-toggle="modal"
                            data-bs-target="#batalpribadi">
                            Pembatalan Porsi Lainnya
                        </button>
                        <button type="button" class="btn btn-item" data-bs-toggle="modal"
                            data-bs-target="#pelimpahanwafat">
                            Pelimpahan Porsi karena Wafat
                        </button>
                        <button type="button" class="btn btn-item" data-bs-toggle="modal"
                            data-bs-target="#pelimpahansakit">
                            Pelimpahan Porsi karena Sakit Permanen
                        </button>
                        <button type="button" class="btn btn-item" data-bs-toggle="modal"
                            data-bs-target="#perbaikandata">
                            Perbaikan Data
                        </button>
                        <a href="https://haji.kemenag.go.id/sieis/estimasi" target="_blank"
                            class="btn btn-item text-decoration-none pt-4">
                            Cek Keberangkatan Haji
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="text-center text-white d-block bg-danger pt-2 pb-2">~ Format Naskah ~</h5>
                <div class="bg-white p-3">
                    <p class="mb-0"><b>Pembatalan Porsi</b></p>
                    <ul>
                        <li><a href="../dok/Format-Surat-Ket-Ahli-Waris.pdf" target="_blank"
                                class="text-decoration-none">Surat
                                Keterangan Ahli Waris</a></li>
                        <li><a href="../dok/Format-Surat-Kuasa-Pembatalan.pdf" target="_blank"
                                class="text-decoration-none">Surat
                                Kuasa</a></li>
                        <li><a href="../dok/Format-Surat-Kuasa-Berhalangan-Hadir.pdf" target="_blank"
                                class="text-decoration-none">Surat Kuasa (Berhalangan Hadir)</a></li>
                    </ul>
                    <p class="mb-0"><b>Pelimpahan Porsi</b></p>
                    <ul>
                        <li><a href="../dok/Format-Surat-Kuasa-Pelimpahan-Wafat.pdf" target="_blank"
                                class="text-decoration-none">Surat Kuasa Wafat</a></li>
                        <li><a href="../dok/Format-Surat-Kuasa-Pelimpahan-Sakit.pdf" target="_blank"
                                class="text-decoration-none">Surat Kuasa Sakit Permanen</a></li>
                    </ul>
                </div>

                <h5 class="text-center text-white d-block bg-danger pt-2 pb-2 mt-3">~ Murottal ~</h5>
                <div class="bg-white p-3">
                    <select class="form-select" id="pilihmp3" aria-label="Default select example" onchange="putar()">
                        @foreach ($mp3 as $item)
                            <option value="{{ $item['recitation'] }}">{{ $item['number_of_surah'] }}.
                                &nbsp;&nbsp;{{ $item['name'] }}
                                - ({{ $item['name_translations']['ar'] }})</option>
                        @endforeach
                    </select>
                    <div id="pemutar" class="mt-3">
                        <audio controls mute>
                            <source src="https://download.quranicaudio.com/quran/mishaari_raashid_al_3afaasee/001.mp3"
                                type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MANASIK HAJI --}}
    <div class="container mb-3 pb-3">
        <div class="row">
            <div class="col-lg">
                <h5 class="text-center text-white d-block bg-danger pt-2 pb-2">~ Bimbingan Manasik ~</h5>
                <div class="bg-white manasik-haji py-3">
                    <div class="card bimsik mb-3" style="width: 18rem;">
                        <img src="../../img/doa/tuntunan manasik.png" class="card-img-top p-3" alt="Bimbingan Manasik">
                        <div class="card-body">
                            <a href="https://haji.kemenag.go.id/v4/sites/default/files/2020-04/Buku%20Tuntunan%20Manasik%20Haji.pdf"
                                target="_blank" class="text-decoration-none stretched-link">
                                <h5 class="card-title text-center text-dark my-0">Tuntunan Manasik</h5>
                            </a>
                        </div>
                    </div>
                    <div class="card bimsik mb-3" style="width: 18rem;">
                        <img src="../../img/doa/manasik haji pr.png" class="card-img-top p-3" alt="Bimbingan Manasik">
                        <div class="card-body">
                            <a href="https://haji.kemenag.go.id/v4/sites/default/files/2021-03/MANASIK%20HAJI%20PEREMPUAN%20dari%20indesain%2024%20sept.pdf"
                                target="_blank" class="text-decoration-none stretched-link">
                                <h5 class="card-title text-center text-dark my-0">Manasik Haji Perempuan</h5>
                            </a>
                        </div>
                    </div>
                    <div class="card bimsik mb-3" style="width: 18rem;">
                        <img src="../../img/doa/doa dan dzikir.png" class="card-img-top p-3" alt="Bimbingan Manasik">
                        <div class="card-body">
                            <a href="https://haji.kemenag.go.id/v4/sites/default/files/2020-04/2.%20Buku%20dzikir%20dan%20doa%20mansik%20%2022%20Maret.pdf"
                                target="_blank" class="text-decoration-none stretched-link">
                                <h5 class="card-title text-center text-dark my-0">Doa dan Dzikir Manasik Haji dan Umrah
                                </h5>
                            </a>
                        </div>
                    </div>
                    <div class="card bimsik mb-3" style="width: 18rem;">
                        <img src="../../img/doa/ringkasan doa.png" class="card-img-top p-3" alt="Bimbingan Manasik">
                        <div class="card-body">
                            <a href="https://haji.kemenag.go.id/v4/sites/default/files/2020-04/3.%20Ringkasan%20Doa%20manasik%2022%20Maret.pdf"
                                target="_blank" class="text-decoration-none stretched-link">
                                <h5 class="card-title text-center text-dark my-0">Ringkasan Doa Manasik Haji dan Umrah</h5>
                            </a>
                        </div>
                    </div>
                    <div class="card bimsik mb-3" style="width: 18rem;">
                        <img src="../../img/doa/konsultasi online.png" class="card-img-top p-3" alt="Bimbingan Manasik">
                        <div class="card-body">
                            <a href="https://haji.kemenag.go.id/v4/sites/default/files/2020-04/Buku%20Konsultasi%20Manasik%20haji%20Pusat_compressed_0.pdf"
                                target="_blank" class="text-decoration-none stretched-link">
                                <h5 class="card-title text-center text-dark my-0">Konsultasi Manasik Haji dan Umrah</h5>
                            </a>
                        </div>
                    </div>
                    <div class="card bimsik mb-3" style="width: 18rem;">
                        <img src="../../img/doa/moderas.png" class="card-img-top p-3" alt="Bimbingan Manasik">
                        <div class="card-body">
                            <a href="https://haji.kemenag.go.id/v4/sites/default/files/2022-12/Moderasi%20Manasik%20Haji%20dan%20Umrah%202022.pdf"
                                target="_blank" class="text-decoration-none stretched-link">
                                <h5 class="card-title text-center text-dark my-0">Moderasi Manasik Haji dan Umrah
                                </h5>
                            </a>
                        </div>
                    </div>
                    <div class="card bimsik mb-3" style="width: 18rem;">
                        <img src="../../img/doa/manasik hajj11.jpeg" class="card-img-top p-3" alt="Bimbingan Manasik">
                        <div class="card-body">
                            <a href="https://haji.kemenag.go.id/v4/sites/default/files/2021-08/Manasik%20Pandemi16_6_21%20tanpa%20foto.pdf"
                                target="_blank" class="text-decoration-none stretched-link">
                                <h5 class="card-title text-center text-dark my-0">Tuntunan Manasik Masa Pandemi</h5>
                            </a>
                        </div>
                    </div>
                    <div class="card bimsik mb-3" style="width: 18rem;">
                        <img src="../../img/doa/kbihu.jpeg" class="card-img-top p-3" alt="Bimbingan Manasik">
                        <div class="card-body">
                            <a href="https://haji.kemenag.go.id/v4/sites/default/files/2021-08/4.%20Buku%20direktori%20rev%206_4_21.pdf"
                                target="_blank" class="text-decoration-none stretched-link">
                                <h5 class="card-title text-center text-dark my-0">Data dan Profil KBIHU</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Data dan Aplikasi --}}
    <div class="container mb-3 pb-3">
        <div class="row">
            <div class="col-lg">
                <h5 class="text-center text-white d-block bg-danger pt-2 pb-2">~ Data dan Aplikasi ~</h5>
                <div class="bg-white manasik-haji py-3">
                    <div class="card bimsik mb-3" style="width: 18rem;">
                        <img src="../../img/doa/ppiu.png" class="card-img-top p-3" alt="Bimbingan Manasik">
                        <div class="card-body">
                            <a href="https://umrahcerdas.kemenag.go.id/home/travel" target="_blank"
                                class="text-decoration-none stretched-link">
                                <h5 class="card-title text-center text-dark my-0">Data PPIU</h5>
                            </a>
                        </div>
                    </div>
                    <div class="card bimsik mb-3" style="width: 18rem;">
                        <img src="../../img/doa/pihk.png" class="card-img-top p-3" alt="Bimbingan Manasik">
                        <div class="card-body">
                            <a href="https://haji.kemenag.go.id/v4/sites/default/files/2023-01/PIHK%20per%20311222.pdf"
                                target="_blank" class="text-decoration-none stretched-link">
                                <h5 class="card-title text-center text-dark my-0">Data PIHK</h5>
                            </a>
                        </div>
                    </div>
                    <div class="card bimsik mb-3" style="width: 18rem;">
                        <img src="../../img/doa/haji pintar.png" class="card-img-top p-3" alt="Bimbingan Manasik">
                        <div class="card-body">
                            <a href="https://play.google.com/store/apps/details?id=com.kemenag_haji_pintar_2019&pli=1"
                                target="_blank" class="text-decoration-none stretched-link">
                                <h5 class="card-title text-center text-dark my-0">Haji Pintar</h5>
                            </a>
                        </div>
                    </div>
                    <div class="card bimsik mb-3" style="width: 18rem;">
                        <img src="../../img/doa/umrah cerdas.png" class="card-img-top p-3" alt="Bimbingan Manasik">
                        <div class="card-body">
                            <a href="https://play.google.com/store/apps/details?id=id.go.simpu.kemenag.umrahcerdas"
                                target="_blank" class="text-decoration-none stretched-link">
                                <h5 class="card-title text-center text-dark my-0">Umrah Cerdas</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- KONTAK --}}
    <div class="container mb-3 pb-3">
        <h5 class="text-center text-white d-block bg-danger pt-2 pb-2">~ Kontak ~</h5>
        <div class="row">
            <div class="col-md-4">
                <div class="container-fluid bg-white">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="bi bi-building-fill"></i> &nbsp;Seksi Peny. Haji dan Umrah
                        </li>
                        <li class="list-group-item"><i class="bi bi-geo-alt-fill"></i> &nbsp;Jalan Siti Armilah No. 1
                            Majalengka
                        </li>
                        <li class="list-group-item"><i class="bi bi-telephone-fill"></i> &nbsp;0233-281222</li>
                        <li class="list-group-item"><i class="bi bi-envelope-at-fill"></i>
                            &nbsp;kabmajalengka@kemenag.go.id</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="container-fluid bg-white">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.59118566918033!2d108.22467203384286!3d-6.835444856622311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f2f83c7b4330d%3A0x836671781ea66374!2sSeksi%20PHU%20KanKemenag%20Kab.%20Majalengka!5e0!3m2!1sid!2sid!4v1690080778650!5m2!1sid!2sid"
                        class="img-fluid" width="800" height="600" style="border:5px;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>












    <!-- Modal Pendaftaran Haji -->
    <div class="modal fade" id="pendaftaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Persyaratan Pendaftaran Haji</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Berkas</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Fotocopy Bukti Setoran Awal BPIH (Lembar Validasi)</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Fotocopy KTP / KIA</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Fotocopy Kartu Keluarga</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Fotocopy Akte Lahir / Akta Nikah / Ijazah</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Fotocopy Buku Tabungan Haji</td>
                                <td>2</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Batal Wafat -->
    <div class="modal fade" id="batalwafat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Persyaratan Pembatalan Porsi Haji karena Wafat
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Berkas</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Surat Permohonan ke Dirjen PHU dari Kemenag</td>
                                <td>Disiapkan oleh Kemenag</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Surat Permohonan ke Kankemenag Kabupaten (materai)</td>
                                <td>Disiapkan oleh Kemenag</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Surat Pernyataan Tanggungjawab Mutlak (materai)</td>
                                <td>Disiapkan oleh Kemenag</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Surat Keterangan Ahli Waris dari Desa mengetahui Camat</td>
                                <td>Asli</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Surat Kuasa Ahli Waris dari Desa (materai)</td>
                                <td>Asli</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>BPIH / SPPH (Setoran Awal/Lunas)</td>
                                <td>Asli</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>KTP Ahli Waris yang diberi Kuasa</td>
                                <td>Fotocopy</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Kartu Keluarga Ahli Waris yang diberi Kuasa</td>
                                <td>Fotocopy</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Buku Rekening Ahli Waris yang diberi Kuasa pada Bank yang sama dengan Tabungan Haji
                                    Almarhum</td>
                                <td>Fotocopy</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Buku Rekening Tabungan Haji Almarhum</td>
                                <td>Fotocopy</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Materai 10.000</td>
                                <td>2 Buah</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Nomor Kontak Ahli Waris yang Aktif</td>
                                <td>HP/SMS</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Batal Pribadi -->
    <div class="modal fade" id="batalpribadi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Persyaratan Pembatalan Porsi Haji</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Berkas</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Surat Permohonan ke Dirjen PHU dari Kemenag</td>
                                <td>Disiapkan oleh Kemenag</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Surat Permohonan ke Kankemenag Kabupaten (materai)</td>
                                <td>Disiapkan oleh Kemenag</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Surat Pernyataan Tanggungjawab Mutlak (materai)</td>
                                <td>Disiapkan oleh Kemenag</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>BPIH / SPPH (Setoran Awal/Lunas)</td>
                                <td>Asli</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>KTP</td>
                                <td>Fotocopy</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Kartu Keluarga</td>
                                <td>Fotocopy</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Buku Rekening Tabungan Haji</td>
                                <td>Fotocopy</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Surat Kuasa (Apabila Jemaah berhalangan atau Sakit)</td>
                                <td>Asli</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Materai 10.000</td>
                                <td>2 Buah</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Nomor Kontak Ahli Waris yang Aktif</td>
                                <td>HP/SMS</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pelimpahan Wafat -->
    <div class="modal fade" id="pelimpahanwafat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Persyaratan Pelimpahan Porsi Haji karena Wafat
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Berkas</th>
                                <th scope="col">Jml</th>
                                <th scope="col">Asli</th>
                                <th scope="col">Fotocopy</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Formulir pengajuan Pelimpahan Porsi Haji</td>
                                <td class="text-center">1</td>
                                <td colspan="2">Disiapkan oleh Kemenag</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Surat Permohonan Pelimpahan Porsi</td>
                                <td class="text-center">1</td>
                                <td colspan="2">Disiapkan oleh Kemenag</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Surat Pernyataan Tanggungjawab Mutlak (materai)</td>
                                <td class="text-center">1</td>
                                <td colspan="2">Disiapkan oleh Kemenag</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>BPIH / SPPH (Setoran Awal/Lunas)</td>
                                <td class="text-center">1</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-x"></i></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Surat Kuasa Penunjukan Pelimpahan Porsi diKetahui RT, RW, Kepala Desa/Lurah, dan Camat
                                    (Tanda Tangan
                                    dan Stempel)</td>
                                <td class="text-center">1</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-x"></i></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Akta Kematian dari Dinas Kependudukan</td>
                                <td class="text-center">2</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>KTP/KIA Penerima dan Salah Satu Pemberi Kuasa Pelimpahan Porsi</td>
                                <td class="text-center">2</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Kartu Keluarga Penerima dan Salah Satu Pemberi Kuasa Pelimpahan Porsi</td>
                                <td class="text-center">2</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Akte Lahir dan Buku Nikah Penerima Pelimpahan Porsi</td>
                                <td class="text-center">2</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Buku Tabungan Haji Penerima Pelimpahan Porsi</td>
                                <td class="text-center">2</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Materai 10.000</td>
                                <td class="text-center">2</td>
                                <td class="text-center"><i class="bi bi-dash"></i></td>
                                <td class="text-center"><i class="bi bi-dash"></i></td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td colspan="4">Pada saat pengajuan berkas pelimpahan porsi : Penerima dan salah satu
                                    Pemberi Kuasa
                                    wajib Hadir</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pelimpahan Sakit -->
    <div class="modal fade" id="pelimpahansakit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Persyaratan Pelimpahan Porsi Haji karena Sakit
                        Permanen
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Berkas</th>
                                <th scope="col">Jml</th>
                                <th scope="col">Asli</th>
                                <th scope="col">Fotocopy</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Formulir pengajuan Pelimpahan Porsi Haji</td>
                                <td class="text-center">1</td>
                                <td colspan="2">Disiapkan oleh Kemenag</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Surat Permohonan Pelimpahan Porsi</td>
                                <td class="text-center">1</td>
                                <td colspan="2">Disiapkan oleh Kemenag</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Surat Pernyataan Tanggungjawab Mutlak (materai)</td>
                                <td class="text-center">1</td>
                                <td colspan="2">Disiapkan oleh Kemenag</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>BPIH / SPPH (Setoran Awal/Lunas)</td>
                                <td class="text-center">1</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-x"></i></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Surat Kuasa Penunjukan Pelimpahan Porsi diKetahui RT, RW, Kepala Desa/Lurah, dan Camat
                                    (Tanda Tangan
                                    dan Stempel)</td>
                                <td class="text-center">1</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-x"></i></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Surat Keterangan Sakit dari Rumah Sakit Pemerintah dengan kategori Sakit Permanen sesuai
                                    Surat Edaran
                                    MenKes Nomor : HK.02.01/Menkes/33/2020</td>
                                <td class="text-center">2</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>KTP/KIA Penerima dan Salah Satu Pemberi Kuasa Pelimpahan Porsi</td>
                                <td class="text-center">2</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Kartu Keluarga Penerima dan Salah Satu Pemberi Kuasa Pelimpahan Porsi</td>
                                <td class="text-center">2</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Akte Lahir dan Buku Nikah Penerima Pelimpahan Porsi</td>
                                <td class="text-center">2</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Buku Tabungan Haji Penerima Pelimpahan Porsi</td>
                                <td class="text-center">2</td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                                <td class="text-center"><i class="bi bi-check2"></i></td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Materai 10.000</td>
                                <td class="text-center">2</td>
                                <td class="text-center"><i class="bi bi-dash"></i></td>
                                <td class="text-center"><i class="bi bi-dash"></i></td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td colspan="4">Pada saat pengajuan berkas pelimpahan porsi : Penerima dan salah satu
                                    Pemberi Kuasa
                                    wajib Hadir</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Perbaikan Data -->
    <div class="modal fade" id="perbaikandata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Persyaratan Perbaikan Data SPH</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Berkas</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Fotocopy BPIH/SPPH (yang jelas)</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Fotocopy KTP / KIA (yang jelas)</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Fotocopy Kartu Keluarga (yang jelas)</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Fotocopy Akte Lahir / Akta Nikah / Ijazah (yang jelas)</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        window.onload = function() {
            jam();
        }

        function jam() {
            var e = document.getElementById('jam'),
                d = new Date(),
                h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ':' + m + ':' + s;

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
    </script>
@endsection
