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
              <li class="breadcrumb-item"><a href="/dash/agenda">Agenda Pendaftaran</a></li>
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
          <div class="col-md-7 kotak-isian">

            <form action="/dash/agenda" method="post">
              @csrf

              <div class="row mb-3">
                <div class="col-3">
                  <label for="agenda" class="form-label">Agenda</label>
                  <input type="text" class="form-control @error('agenda') is-invalid @enderror" name="agenda"
                    id="agenda" value="{{ old('agenda') }}" readonly>
                  @error('agenda')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-3">
                  <label for="nomoragenda" class="form-label">Nomor Agenda</label>
                  <input type="text" class="form-control @error('nomoragenda') is-invalid @enderror" name="nomoragenda"
                    id="nomoragenda" value="{{ old('nomoragenda') }}" onfocusout="teksagenda()" autofocus required>
                  @error('nomoragenda')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-1"></div>
                <div class="col-3">
                  <label for="bulan">Bulan</label>
                  <select class="form-control select2" name="bulan" id="bulan">
                    @foreach ($bulans as $item)
                      @if (old('bulan') == $item->namabulan)
                        <option value="{{ $item->namabulan }}" selected="selected">{{ $item->namabulan }}</option>
                      @else
                        <option value="{{ $item->namabulan }}">{{ $item->namabulan }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="col-2">
                  <label for="tahun">Tahun</label>
                  <select class="form-control select2" name="tahun" id="tahun">
                    @foreach ($tahuns as $item)
                      @if (old('tahun') == $item->tahun)
                        <option value="{{ $item->tahun }}" selected="selected">{{ $item->tahun }}</option>
                      @else
                        <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <hr style="border-color:rgba(255,255,255,0.3);">

              <div class="row mb-3">
                <div class="col-3">
                  <label for="tglregister" class="form-label">Tanggal Register</label>
                  <input type="date" class="form-control @error('tglregister') is-invalid @enderror" name="tglregister"
                    id="tglregister" value="{{ old('tglregister') }}" required>
                  @error('tglregister')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-3">
                  <label for="porsi" class="form-label">Nomor Porsi</label>
                  <input type="text" class="form-control @error('porsi') is-invalid @enderror" name="porsi"
                    id="porsi" value="{{ old('porsi') }}" required>
                  @error('porsi')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-6">
                  <label for="namajamaah" class="form-label">Nama Jamaah</label>
                  <input type="text" class="form-control @error('namajamaah') is-invalid @enderror" name="namajamaah"
                    id="namajamaah" value="{{ old('namajamaah') }}" onkeyup="hb()" required>
                  @error('namajamaah')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-6">
                  <label for="bin" class="form-label">Bin / Binti</label>
                  <input type="text" class="form-control @error('bin') is-invalid @enderror" name="bin"
                    id="bin" value="{{ old('bin') }}" required>
                  @error('bin')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-3">
                  <label for="jeniskelamin_id">Jenis Kelamin</label>
                  <select class="form-control select2" name="jeniskelamin_id" id="jeniskelamin_id">
                    @foreach ($jeniskelamin as $item)
                      @if (old('jeniskelamin_id') == $item->id)
                        <option value="{{ $item->id }}" selected="selected">{{ $item->kelamin }}</option>
                      @else
                        <option value="{{ $item->id }}">{{ $item->kelamin }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-3">
                  <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                  <input type="text" class="form-control @error('tempatlahir') is-invalid @enderror"
                    name="tempatlahir" id="tempatlahir" value="{{ old('tempatlahir') }}" required>
                  @error('tempatlahir')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-3">
                  <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control @error('tgllahir') is-invalid @enderror" name="tgllahir"
                    id="tgllahir" value="{{ old('tgllahir') }}" required>
                  @error('tgllahir')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-3">
                  <label for="desa" class="form-label">Desa / Kelurahan</label>
                  <input type="text" class="form-control @error('desa') is-invalid @enderror" name="desa"
                    id="desa" value="{{ old('desa') }}" required>
                  @error('desa')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-3">
                  <label for="kecamatan_id">Kecamata</label>
                  <select class="form-control select2" name="kecamatan_id" id="kecamatan_id">
                    @foreach ($kecamatan as $item)
                      @if (old('kecamatan_id') == $item->id)
                        <option value="{{ $item->id }}" selected="selected">{{ $item->namakecamatan }}</option>
                      @else
                        <option value="{{ $item->id }}">{{ $item->namakecamatan }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <hr class="mt-5" style="border-color:rgba(255,255,255,0.3);">

              <div class="row mb-3">
                <div class="col-3">
                  <label for="bank_id">Bank BPS</label>
                  <select class="form-control select2" name="bank_id" id="bank_id">
                    @foreach ($bank as $item)
                      @if (old('bank_id') == $item->id)
                        <option value="{{ $item->id }}" selected="selected">{{ $item->namabank }}</option>
                      @else
                        <option value="{{ $item->id }}">{{ $item->namabank }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="col-3">
                  <label for="tglsetor" class="form-label">Tanggal Setor</label>
                  <input type="date" class="form-control @error('tglsetor') is-invalid @enderror" name="tglsetor"
                    id="tglsetor" value="{{ old('tglsetor') }}" required>
                  @error('tglsetor')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>

              <hr class="mt-5" style="border-color:rgba(255,255,255,0.3);">

              <div class="row mb-3">
                <div class="col-3">
                  <label for="verifikator_id">Nama Petugas</label>
                  <select class="form-control select2" name="verifikator_id" id="verifikator_id">
                    @foreach ($verifikator as $item)
                      @if (old('verifikator_id') == $item->id)
                        <option value="{{ $item->id }}" selected="selected">{{ $item->namapetugas }}</option>
                      @else
                        <option value="{{ $item->id }}">{{ $item->namapetugas }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="col-3">
                  <label for="pejabat_id">Nama Petugas</label>
                  <select class="form-control select2" name="pejabat_id" id="pejabat_id">
                    @foreach ($pejabat as $item)
                      @if (old('pejabat_id') == $item->id)
                        <option value="{{ $item->id }}" selected="selected">{{ $item->namapejabat }}</option>
                      @else
                        <option value="{{ $item->id }}">{{ $item->namapejabat }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
              </div>

              <hr class="mt-5" style="border-color:rgba(255,255,255,0.3);">

              <div class="d-flex justify-content-between">
                <a href="/dash/agenda" class="btn btn-secondary"><i class="fas fa-undo"></i> Kembali</a>
                <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-location-arrow"></i>
                  Tambah</button>
              </div>
            </form>

          </div>
          <div class="col-md-4 ml-3 kotak-isian">

            <table id="example2" class="table table-bordered table-striped bg-light">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Porsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pendaftarans as $item)
                  <tr>
                    <td>{{ $item->agenda }}</td>
                    <td>{{ $item->porsi }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="/js/pendaftaran.js"></script>

@endsection
