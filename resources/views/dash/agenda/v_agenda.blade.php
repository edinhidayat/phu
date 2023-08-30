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
              <li class="breadcrumb-item active">Agenda Pendaftaran</li>
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
                <a href="/dash/agenda/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped bg-light">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Agenda</th>
                      <th>Porsi</th>
                      <th>Nama<br>Bin / Binti</th>
                      <th>Kelamin</th>
                      <th>Alamat</th>
                      <th>Bank<br>Tanggal Setor</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pendaftarans as $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nomoragenda }}</td>
                        <td>{{ $item->porsi }}</td>
                        <td>{{ $item->namajamaah }}<br>Bin {{ $item->bin }}</td>
                        <td>{{ $item->jeniskelamin->kelamin }}</td>
                        <td>{{ $item->desa }},<br>Kec. {{ $item->kecamatan->namakecamatan }}</td>
                        {{-- <td>{{ Carbon\Carbon::parse($item->tglsetor)->translatedFormat('d F Y') }}</td> --}}
                        <td>{{ $item->bank->namabank }},<br>{{ Carbon\Carbon::parse($item->tglsetor)->translatedFormat('d F Y') }}</td>
                        <td class="text-center">
                          <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#agenda{{ $item->porsi }}"><i class="fas fa-eye"></i>
                            Lihat</button>
                          <a href="/dash/agenda/{{ $item->id }}/edit" style="text-decoration: none;"
                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                          <form action="/dash/agenda/{{ $item->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm"
                              onclick="return confirm('Anda yakin ingin Hapus data ini??')"><i
                                class="fas fa-trash-alt"></i>
                              Hapus</button>
                          </form>
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
  @foreach ($pendaftarans as $item)
  <div class="modal fade" id="agenda{{ $item->porsi }}" data-backdrop="static" tabindex="-1" data-keyboard="false"
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
          <div class="row">
            <div class="col-6">
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
                  <td> {{ $item->jeniskelamin->kelamin }}</td>
                </tr>
                <tr>
                  <td width="100px">Tempat/Tgl. Lahir </td>
                  <td>: </td>
                  <td> {{ $item->tempatlahir }}, {{ Carbon\Carbon::parse($item->tgllahir)->translatedFormat('d F Y') }}
                  </td>
                </tr>
                <tr>
                  <td width="100px">Desa </td>
                  <td>: </td>
                  <td> {{ $item->desa }}</td>
                </tr>
                <tr>
                  <td width="100px">Kecamatan </td>
                  <td>: </td>
                  <td> {{ $item->kecamatan->namakecamatan }}</td>
                </tr>
                <tr>
                  <td width="100px">Tanggal Register </td>
                  <td>: </td>
                  <td> {{ Carbon\Carbon::parse($item->tglregister)->translatedFormat('d F Y') }}</td>
                </tr>
              </table>
            </div>

            <div class="col-6">
              <table>
                <tr>
                  <td width="150px">Nama Bank </td>
                  <td>: </td>
                  <td> {{ $item->bank->namabank }}</td>
                </tr>
                <tr>
                  <td width="100px">Tanggal Setor </td>
                  <td>: </td>
                  <td> {{ Carbon\Carbon::parse($item->tglsetor)->translatedFormat('d F Y') }}</td>
                </tr>
              </table>

              <table style="margin-top: 25px;">
                <tr>
                  <td width="150px">Petugas </td>
                  <td>: </td>
                  <td> {{ $item->verifikator->namapetugas }}</td>
                </tr>
                <tr>
                  <td width="100px">NIP </td>
                  <td>: </td>
                  <td> {{ $item->verifikator->nippetugas }} </td>
                </tr>
              </table>

              <table style="margin-top: 25px;">
                <tr>
                  <td width="100px">Pejabat </td>
                  <td>: </td>
                  <td> {{ $item->pejabat->gelardepan }} {{ $item->pejabat->namapejabat }},
                    {{ $item->pejabat->gelarbelakang }}</td>
                </tr>
                <tr>
                  <td width="150px">NIP </td>
                  <td>: </td>
                  <td> {{ $item->pejabat->nippejabat }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  
@endsection
