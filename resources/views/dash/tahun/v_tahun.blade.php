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
              <li class="breadcrumb-item"><a href="/dash/basic">Settings</a></li>
              <li class="breadcrumb-item active">Tahun</li>
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
          <div class="col-8">

            <div class="card">
              <div class="card-body">
                <a href="/dash/tahun/create" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped bg-light">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Masehi</th>
                      <th>Hijriah</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tahuns as $thn)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $thn->tahun }}</td>
                        <td>{{ $thn->hijriah }}</td>
                        <td class="text-center">
                          <a href="/dash/tahun/{{ $thn->id }}/edit" style="text-decoration: none;"
                            class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                          <form action="/dash/tahun/{{ $thn->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger"
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
@endsection
