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
                            <li class="breadcrumb-item active">Data Pelimpahan</li>
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
                                <a href="/dash/pelimpahan/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i>
                                    Tambah Data</a>
                                <table id="example1" class="table table-bordered table-striped bg-light">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Porsi</th>
                                            <th>Nama</th>
                                            <th>Penerima</th>
                                            <th>Hubungan</th>
                                            <th>Alamat</th>
                                            <th>Tahapan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pelimpahans as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->porsi }}</td>
                                                <td>{{ $item->namajamaah }}<br>({{ $item->alasanpelimpahan }})</td>
                                                <td>{{ $item->namapenerima }}<br>{{ $item->jeniskelamin }}<br>{{ $item->hppenerima }}
                                                </td>
                                                <td>{{ $item->hubungan }}</td>
                                                <td>Ds {{ $item->desa }}<br>Kec. {{ $item->kec }}<br>Kab./Kota
                                                    {{ $item->kab }}</td>
                                                <td>{{ $item->proses }}<br>{{ Carbon\Carbon::parse($item->tglproses)->translatedFormat('d F Y') }}
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm d-block mb-1"
                                                        data-toggle="modal" data-target="#lph{{ $item->porsi }}"><i
                                                            class="fas fa-print"></i> Cetak</button>
                                                    <a href="/dash/pelimpahan/{{ $item->id }}/edit"
                                                        style="text-decoration: none;"
                                                        class="btn btn-warning btn-sm d-block mb-1"><i
                                                            class="fas fa-edit"></i> Ubah</a>
                                                    <button type="button" class="btn btn-sm btn-danger d-block"
                                                        data-toggle="modal" data-target="#hpslph{{ $item->id }}"><i
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
    @foreach ($pelimpahans as $item)
        <div class="modal fade" id="lph{{ $item->porsi }}" data-backdrop="static" tabindex="-1" data-keyboard="false"
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
                                <h4 class="text-center"><b>Pelimpahan Porsi karena <span
                                            class="text-warning">{{ $item->alasanpelimpahan }}</span></b></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h5>A. DATA JAMAAH</h5>
                                <table style="margin-bottom: 25px;">
                                    <tr>
                                        <td width="150px">Nomor Porsi </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->porsi }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Nama Jamaah </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->namajamaah }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Bin/Binti </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->binjamaah }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-6">
                                <h5>B. TAHAPAN</h5>
                                <table style="margin-bottom: 25px;">
                                    <tr>
                                        <td width="150px">Status </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->proses }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Tanggal </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ Carbon\Carbon::parse($item->tglproses)->translatedFormat('d F Y') }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <h5>C. DATA PENERIMA KUASA</h5>
                                <table>
                                    <tr>
                                        <td width="150px">Nomor KTP </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->ktppenerima }}</td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Nomor HP </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->hppenerima }}</td>
                                    </tr>
                                    <tr>
                                        <td width="150px">Nama Lengkap </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->namapenerima }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Bin/Binti </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->binpenerima }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Hubungan </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->hubungan }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Jenis Kelamin </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->jeniskelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Tempat/Tgl Lahir </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->tmplahir }},
                                            {{ Carbon\Carbon::parse($item->tgllahir)->translatedFormat('d F Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Alamat </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->alamat }} {{ $item->rt }} {{ $item->rw }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Desa/Kelurahan </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->desa }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Kecamatan </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->kec }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Kab./Kota </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->kab }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Provinsi </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->prov }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Nama Bank </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->bank }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Nomor Rekening </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->norek }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-6">
                                <h5>D. DATA PEMBERI KUASA</h5>
                                <table>
                                    <tr>
                                        <td width="150px">Nomor KTP </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->ktppemberi }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Nomor HP </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->hppemberi }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Nama Lengkap </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->namapemberi }}</td>
                                    </tr>
                                </table>
                                <h5 class="mt-5">E. PETUGAS</h5>
                                <table>
                                    <tr>
                                        <td width="150px">Pejabat </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->pejabat->gelardepan }} {{ $item->pejabat->namapejabat }},
                                            {{ $item->pejabat->gelarbelakang }}</td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Petugas </td>
                                        <td>: </td>
                                        <td>&nbsp; {{ $item->verifikator->namapetugas }}</td>
                                    </tr>
                                </table>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="/dash/pelimpahan/word/{{ $item->id }}" type="button" class="btn btn-success"
                            target="_blank"><i class="fas fa-download"></i> Template Srikandi</a>
                        <a href="/dash/pelimpahan/{{ $item->id }}" type="button" class="btn btn-primary"
                            target="_blank"><i class="fas fa-print"></i> Cetak</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal HAPUS -->
    @foreach ($pelimpahans as $item)
        <div class="modal fade" id="hpslph{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        <form action="/dash/pelimpahan/{{ $item->id }}" method="post">
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
