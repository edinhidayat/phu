@extends('dash.layouts.main')

@section('konten')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @if (session()->has('suksestambah'))
            <div class="suksestambah"></div>
        @endif
        @if (session()->has('suksesedit'))
            <div class="suksesedit"></div>
        @endif
        @if (session()->has('sukseshapus'))
            <div class="sukseshapus"></div>
        @endif

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Pembatalan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col">

                        <div class="card">
                            <div class="card-body">
                                <a href="/dash/batal/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah
                                    Data</a>
                                <table id="example1" class="table table-bordered table-striped bg-light">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Porsi</th>
                                            <th>Nama<br>Bin / Binti</th>
                                            <th>Kelamin</th>
                                            <th>Alasan Pembatalan<br>No. Telp</th>
                                            <th>Nama Ahli Waris<br>Rekening</th>
                                            <th>Tahapan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembatalans as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->porsi }}</td>
                                                <td>{{ $item->namajamaah }}<br>Bin {{ $item->bin }}</td>
                                                <td>{{ $item->jeniskelamin }}</td>
                                                <td>{{ $item->alasanpembatalan }}<br>{{ $item->nohp }}</td>
                                                <td>{{ $item->namawaris }}<br>{{ $item->bankwaris }}<br>{{ $item->norekwaris }}
                                                </td>
                                                <td>{{ $item->proses }}<br>{{ Carbon\Carbon::parse($item->tglproses)->translatedFormat('d F Y') }}
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm d-block mb-1"
                                                        data-toggle="modal" data-target="#btl{{ $item->porsi }}"><i
                                                            class="fas fa-print"></i> Cetak</button>
                                                    <a href="/dash/batal/{{ $item->id }}/edit"
                                                        style="text-decoration: none;"
                                                        class="btn btn-warning btn-sm d-block mb-1"><i
                                                            class="fas fa-edit"></i> Ubah</a>
                                                    <button type="button" class="btn btn-sm btn-danger d-block"
                                                        data-toggle="modal" data-target="#hpsbtl{{ $item->id }}"><i
                                                            class="fas fa-trash-alt"></i> Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    @foreach ($pembatalans as $item)
        <div class="modal fade" id="btl{{ $item->porsi }}" data-backdrop="static" tabindex="-1" data-keyboard="false"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Preview</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row mb-3">
                            <div class="col-sm">
                                <h4 class="text-center"><b>Pembatalan Setoran <span
                                            class="text-success">{{ $item->setoran }}</span> karena <span
                                            class="text-warning">{{ $item->alasanpembatalan }}</span></b></h4>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <h5>A. DATA JAMAAH</h5>
                                <table>
                                    <tr>
                                        <td width="150px">Porsi </td>
                                        <td>: </td>
                                        <td> {{ $item->porsi }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Nama Jamaah </td>
                                        <td>: </td>
                                        <td> {{ $item->namajamaah }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Bin/Binti </td>
                                        <td>: </td>
                                        <td> {{ $item->bin }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Jenis Kelamin </td>
                                        <td>: </td>
                                        <td> {{ $item->jeniskelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Alamat Lengkap </td>
                                        <td>: </td>
                                        <td> {{ $item->alamatjamaah }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Kecamatan </td>
                                        <td>: </td>
                                        <td> {{ $item->kecjamaah }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Kabupaten </td>
                                        <td>: </td>
                                        <td> Majalengka</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Nama Bank </td>
                                        <td>: </td>
                                        <td> {{ $item->bankjamaah }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Nomor Rekening </td>
                                        <td>: </td>
                                        <td> {{ $item->norekjamaah }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Jumlah Setoran </td>
                                        <td>: </td>
                                        <td> Rp. {{ $item->uang }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Tanggal SPPH </td>
                                        <td>: </td>
                                        <td> {{ $item->spph }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-6">
                                <h5>B. DATA AHLI WARIS</h5>
                                <table>
                                    <tr>
                                        <td width="150px">Nama Ahli Waris </td>
                                        <td>: </td>
                                        <td> {{ $item->namawaris }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Alamat Lengkap </td>
                                        <td>: </td>
                                        <td> {{ $item->alamatwaris }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Kecamatan </td>
                                        <td>: </td>
                                        <td> {{ $item->kecwaris }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Kabupaten </td>
                                        <td>: </td>
                                        <td> {{ $item->kabwaris }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Hubungan Keluarga </td>
                                        <td>: </td>
                                        <td> {{ $item->hubungan }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Nama Bank </td>
                                        <td>: </td>
                                        <td> {{ $item->bankwaris }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Nomor Rekening </td>
                                        <td>: </td>
                                        <td> {{ $item->norekwaris }}</td>
                                    </tr>
                                </table>

                                <table style="margin-top: 25px;">
                                    <tr>
                                        <td width="100px">Nomor HP </td>
                                        <td>: </td>
                                        <td> {{ $item->nohp }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Nomor KTP </td>
                                        <td>: </td>
                                        <td> {{ $item->ktp }}</td>
                                    </tr>
                                </table>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="/dash/batal/word/{{ $item->id }}" type="button" class="btn btn-success"
                            target="_blank"><i class="fas fa-download"></i> Template Srikandi</a>
                        <a href="/dash/batal/{{ $item->id }}" type="button" class="btn btn-primary" target="_blank"><i
                                class="fas fa-print"></i> Cetak</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal HAPUS -->
    @foreach ($pembatalans as $item)
        <div class="modal fade" id="hpsbtl{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin akan menghapus data Porsi {{ $item->porsi }} : {{ $item->namajamaah }} ???
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="/dash/batal/{{ $item->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
