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
              <li class="breadcrumb-item"><a href="/dash/bank">Bank</a></li>
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
  
                <form action="/dash/bank" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="kodebank" class="form-label">Kode Bank</label>
                      <input type="text" class="form-control @error('kodebank') is-invalid @enderror" name="kodebank" id="kodebank" value="{{ old('kodebank') }}" autofocus required>
                        @error('kodebank')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="namabank" class="form-label">Nama Bank</label>
                      <input type="text" class="form-control @error('namabank') is-invalid @enderror" name="namabank" id="namabank" value="{{ old('namabank') }}" required>
                        @error('namabank')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="/dash/bank" class="btn btn-secondary"><i class="fas fa-undo"></i> Kembali</a>
                        <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-location-arrow"></i> Tambah</button>
                    </div>
                </form>

              </div>
            </div>
        </div>
    </section>
</div>

 @endsection