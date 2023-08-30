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
              <li class="breadcrumb-item"><a href="/dash/pejabat">Pejabat</a></li>
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

            <form action="/dash/pejabat" method="post">
              @csrf
              <div class="row mb-3">
                <div class="col">
                  <label for="gelardepan" class="form-label">Gelar Depan</label>
                  <input type="text" class="form-control @error('gelardepan') is-invalid @enderror" name="gelardepan"
                    id="gelardepan" value="{{ old('gelardepan') }}" autofocus>
                  @error('gelardepan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col">
                  <label for="gelarbelakang" class="form-label">Gelar Belakang</label>
                  <input type="text" class="form-control @error('gelarbelakang') is-invalid @enderror"
                    name="gelarbelakang" id="gelarbelakang" value="{{ old('gelarbelakang') }}">
                  @error('gelarbelakang')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="mb-3">
                <label for="namapejabat" class="form-label">Nama Pejabat</label>
                <input type="text" class="form-control @error('namapejabat') is-invalid @enderror" name="namapejabat"
                  id="namapejabat" value="{{ old('namapejabat') }}" required>
                @error('namapejabat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="nippejabat" class="form-label">NIP Pejabat</label>
                <input type="text" class="form-control @error('nippejabat') is-invalid @enderror" name="nippejabat"
                  id="nippejabat" value="{{ old('nippejabat') }}" required>
                @error('nippejabat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="row form-group">
                <div class="col-3">
                  <label for="gol">Golongan</label>
                  <select class="form-control select2" name="gol" id="gol">
                    @foreach ($gols as $item)
                      @if (old('gol') == $item->gol)
                        <option value="{{ $item->gol }}" selected="selected">{{ $item->gol }}</option>
                      @else
                        <option value="{{ $item->gol }}">{{ $item->gol }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="col-9">
                  <label for="pangkat" class="form-label">Pangkat</label>
                  <input type="text" class="form-control @error('pangkat') is-invalid @enderror" name="pangkat"
                    id="pangkat" value="{{ old('pangkat') }}" readonly>
                  @error('pangkat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>

              <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan"
                  id="jabatan" value="{{ old('jabatan') }}" required>
                @error('jabatan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="d-flex justify-content-between">
                <a href="/dash/pejabat" class="btn btn-secondary"><i class="fas fa-undo"></i> Kembali</a>
                <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-location-arrow"></i>
                  Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="/js/pejabat.js"></script>

@endsection
