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
              <li class="breadcrumb-item"><a href="/dash/user">User</a></li>
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

            <form action="/dash/user" method="post">
              @csrf
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                  id="nama" value="{{ old('nama') }}" autofocus required>
                @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">Username (min.4 huruf)</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                  id="username" value="{{ old('username') }}" required>
                @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password (max.6 karakter)</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                  id="password" required>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3 d-flex justify-content-between">
                <div class="col-6">
                  <div class="form-group">
                    <label for="pengguna_id">Pengguna</label>
                    <select class="form-control select2" name="pengguna_id" id="pengguna_id" style="width: 100%;">
                      @foreach ($penggunas as $item)
                        @if (old('pengguna_id') == $item->id)
                          <option value="{{ $item->id }}" selected="selected">{{ $item->pengguna }}</option>
                        @else
                          <option value="{{ $item->id }}">{{ $item->pengguna }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="active">Aktivasi</label>
                    <select class="form-control select2" name="active" style="width: 100%;">
                      @if (old('active') == 1)
                        <option value="1" selected="selected">1 (Aktif)</option>
                        <option value="0">0 (Tidak Aktif)</option>
                      @else
                        <option value="1">1 (Aktif)</option>
                        <option value="0" selected="selected">0 (Tidak Aktif)</option>
                      @endif
                    </select>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-between">
                <a href="/dash/user" class="btn btn-secondary"><i class="fas fa-undo"></i> Kembali</a>
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
