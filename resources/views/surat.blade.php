@extends('template.awal')
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="px-3 pt-3 mb-0">
                    <img src="../img/kitab.png" class="gb-kitab" alt="Kitab" style="height: 50px;">
                    <h5 class="teks4">Al-qur'an Digital</h5>
                </div>
            </div>
        </div>
        <hr class="py-1 mb-0" style="border-top: 5px solid black;">
        <div class="row">
            <div class="col">
                <div class="card text-bg-warning mb-3">
                    <div class="card-header bg-danger text-center"><h5 class="text-white py-1 mb-0"><b>Surah</b></h5></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($surah as $item)   
                                <div class="col-lg-3">
                                    <div class="card border-primary mb-3">
                                        <div class="card-header bg-primary">
                                            <h5 class="card-title text-center pt-2 mb-0"><span class="nama-surat">{{ $item['nama'] }}</span></h5>
                                        </div>
                                        <div class="card-body text-primary">
                                            <p class="p-0 m-0" style="font-weight: bold;">{{ $item['nomor'] }}.&nbsp; {{ $item['namaLatin'] }}</p>
                                            <p class="p-0 m-0">({{ $item['arti'] }})</p>
                                            <p class="p-0 m-0">Jumlah : {{ $item['jumlahAyat'] }} Ayat</p>
                                        </div>
                                        <div class="card-footer bg-transparent border-primary text-muted">
                                            <a href="/surat/{{ $item['nomor'] }}" class="stretched-link text-decoration-none">{{ $item['tempatTurun'] }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection