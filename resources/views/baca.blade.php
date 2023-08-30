@extends('template.awal')
@section('konten')

<div class="container mt-3 mb-0">
    <div class="row">
        <div class="col-lg d-flex justify-content-between">
            <a href="{{ $surah['suratSebelumnya'] == false ? '/surat' : '/surat/' . $surah['suratSebelumnya']['nomor'] }}" class="btn btn-warning text-decoration-none sebelumnya"><i class="bi bi-caret-left-square-fill"></i>&nbsp; Sebelumnya</a>
            <button type="button" class="btn btn-warning" style="width:120px;" data-bs-toggle="modal" data-bs-target="#tafsir">
                Tafsir
            </button>
            <a href="{{ $surah['suratSelanjutnya'] == false ? '/surat' : '/surat/' . $surah['suratSelanjutnya']['nomor'] }}" class="btn btn-warning text-decoration-none selanjutnya">Selanjutnya &nbsp;<i class="bi bi-caret-right-square-fill"></i></a>
        </div>
    </div>
</div>

<div class="container mt-2">
    <div class="row">
        <div class="col-lg">
            <div class="card text-bg-light mb-3">
                <div class="card-header bg-danger">
                    <h5 class="text-white text-center nama-surat pt-1 mb-0"><b>~ {{ $surah['nama'] }} ~</b></h5>
                    <hr class="my-0" style="border-top: 3px solid white">
                    <div class="row">
                        <div class="col-lg-7 py-3">
                            <table class="text-white">
                                <tr>
                                    <td>Surat ke </td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp; </td>
                                    <td> {{ $surah['nomor'] }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Surat </td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp; </td>
                                    <td> {{ $surah['namaLatin'] }} ~ ({{ $surah['arti'] }})</td>
                                </tr>
                                <tr>
                                    <td>Jumlah </td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp; </td>
                                    <td> {{ $surah['jumlahAyat'] }} Ayat</td>
                                </tr>
                                <tr>
                                    <td>Tempat diturunkan </td>
                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp; </td>
                                    <td> {{ $surah['tempatTurun'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-5 pt-3">
                            <div class="input-group mb-3 pe-2">
                                <label class="input-group-text" for="murottal">Murottal</label>
                                <select class="form-select" id="murottal" onchange="putar()">
                                    <option value="{{ $surah['audioFull']['05'] }}">Misyari Rasyid Al-Afasi</option>
                                    <option value="{{ $surah['audioFull']['03'] }}">Abdurrahman As-Sudais</option>
                                    <option value="{{ $surah['audioFull']['01'] }}">Abdullah Al-Juhany</option>
                                    <option value="{{ $surah['audioFull']['02'] }}">Abdul Muhsin Al-Qasim</option>
                                    <option value="{{ $surah['audioFull']['04'] }}">Ibrahim Al-Dossari</option>
                                </select>
                            </div>
                            <div id="pemutar" class="d-inline">
                                <audio class="mb-0 pb-0" src="{{ $surah['audioFull']['05'] }}" controls mute></audio>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-secondary">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <img src="../img/bismillah.png" alt="Bismillah" class="my-0 py-0" style="height: 60px;">
                        </div>
                    </div>
                    @foreach ($ayat as $item)
                        <ul class="list-group mb-3">
                            <li class="list-group-item fs-5"><b>~ {{ $item['nomorAyat'] }} ~</b></li>
                            <li class="list-group-item nama-surat text-dark bacaan" style="text-align: right;">{{ $item['teksArab'] }}</li>
                            <li class="list-group-item">{{ $item['teksLatin'] }}</li>
                            <li class="list-group-item"><b>Artinya :</b><br>{{ $item['teksIndonesia'] }}</li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-3">
    <div class="row">
        <div class="col-lg d-flex justify-content-between">
            <a href="{{ $surah['suratSebelumnya'] == false ? '/surat' : '/surat/' . $surah['suratSebelumnya']['nomor'] }}" class="btn btn-warning text-decoration-none sebelumnya"><i class="bi bi-caret-left-square-fill"></i>&nbsp; Sebelumnya</a>
            <button type="button" class="btn btn-warning" style="width:120px;" data-bs-toggle="modal" data-bs-target="#tafsir">
                Tafsir
            </button>
            <a href="{{ $surah['suratSelanjutnya'] == false ? '/surat' : '/surat/' . $surah['suratSelanjutnya']['nomor'] }}" class="btn btn-warning text-decoration-none selanjutnya">Selanjutnya &nbsp;<i class="bi bi-caret-right-square-fill"></i></a>
        </div>
    </div>
</div>





<!-- Modal -->
<div class="modal fade" id="tafsir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tafsir Surat ke-{{ $tafsir['nomor'] }}&nbsp; {{ $tafsir['namaLatin'] }} ({{ $tafsir['jumlahAyat'] }} Ayat)</h1>
                <button type="button" class="btn-close me-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body me-4">
                <table class="table table-striped">
                    @foreach ($tafsir['tafsir'] as $item)
                        <tr>
                            <td style="width: 60px;">{{ $item['ayat'] }}</td>
                            <td style="text-align: justify;">{!! $item['teks'] !!}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary me-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection