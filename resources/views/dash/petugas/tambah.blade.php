@extends('dash.layouts.main')

@section('konten')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dash/petugas">Petugas</a></li>
              <li class="breadcrumb-item active">Tambah</li>
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
          <div class="col-6">

            <form action="/dash/petugas" method="post">
              @csrf
              <div class="mb-3">
                <label for="namapetugas" class="form-label">Nama Petugas</label>
                <input type="text" class="form-control @error('namapetugas') is-invalid @enderror" name="namapetugas"
                  id="namapetugas" value="{{ old('namapetugas') }}" autofocus required>
                @error('namapetugas')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="nippetugas" class="form-label">NIP Petugas</label>
                <input type="text" class="form-control @error('nippetugas') is-invalid @enderror" name="nippetugas"
                  id="nippetugas" value="{{ old('nippetugas') }}" required>
                @error('nippetugas')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="d-flex justify-content-between">
                <a href="/dash/petugas" class="btn btn-secondary"><i class="fas fa-undo"></i> Kembali</a>
                <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-location-arrow"></i>
                  Tambah</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
