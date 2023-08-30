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
              <li class="breadcrumb-item"><a href="/dash/batal">Pembatalan</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <style>
      div.kotak1{
        background-color: white;
        box-shadow: 3px 3px 7px rgba(0, 0, 0, .5);
        color: black;
        padding: 5px 10px 2px 15px;
      }
      div.kotak2{
        box-shadow: 3px 3px 7px rgba(0, 0, 0, .5);
      }
      .hilang{
        display: none;
      }
    </style>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-10">

            <form class="mb-5" action="/dash/batal" method="post">
              @csrf

              <div class="kotak1 rounded mb-3">

                <div class="form-group row mt-3">
                  <label for="tglproses" class="col-sm-3 col-form-label">Tanggal Pengajuan</label>
                  <div class="col-sm-3">
                    <input type="hidden" name="proses" id="proses" value="Pengajuan">
                    <input type="date" class="form-control bg-warning @error('tglproses') is-invalid @enderror" name="tglproses" id="tglproses" value="{{ date('Y-m-d') }}" readonly required>
                  </div>
                </div>

                <div class="form-group row mt-3">
                  <label for="alasanpembatalan" class="col-sm-3 col-form-label">Alasan Pembatalan <span class="text-danger">*</span></label>
                  <select class="col-sm-3 form-control custom-select ml-2" name="alasanpembatalan" id="alasanpembatalan">
                    @foreach ($alasanpembatalan as $item)
                      @if (old('alasanpembatalan') == $item->alasan)
                        <option value="{{ $item->alasan }}" selected="selected">{{ $item->alasan }}</option>
                      @else
                        <option value="{{ $item->alasan }}">{{ $item->alasan }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div class="form-group row d-inline">
                  <label for="setoran" class="col-sm-3 col-form-label">Jenis Setoran <span class="text-danger">*</span></label>
                  <select class="col-sm-3 form-control custom-select ml-2" name="setoran" style="width: 100%;">
                    @if (old('setoran') == 'Lunas')
                      <option value="Awal">Setoran Awal</option>
                      <option value="Lunas" selected="selected">Setoran Lunas</option>
                    @else
                      <option value="Awal" selected="selected">Setoran Awal</option>
                      <option value="Lunas">Setoran Lunas</option>
                    @endif
                  </select>
                  <input type="text" name="uang" id="uang" class="form-control col-sm-2 d-inline @error('uang') is-invalid @enderror" value="{{ old('uang','25.000.000') }}" required>
                  @error('uang')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                  
                <hr style="border:1px solid rgba(0,0,0,.3);">

                <div class="mb-3">
                  <div class="row">
                    <div class="col-3 d-inline">
                      <label for="bulanangka">Bulan Proses</label>
                    </div>
                    <div class="col-1 d-inline mr-2">
                      <select class="form-control select2 d-inline" name="bulanangka" id="bulanangka" style="width: 75px;">
                        @foreach ($bulans as $item)
                          @if (old('bulanangka') == $item->angkabulan)
                            <option value="{{ $item->angkabulan }}" selected="selected">{{ $item->angkabulan }}</option>
                          @else
                            <option value="{{ $item->angkabulan }}">{{ $item->angkabulan }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>

                    <div class="col-3 d-inline">
                      <input type="text" name="bulanproses" id="bulanproses" class="form-control d-inline-block @error('bulanproses') is-invalid @enderror" value="{{ old('bulanproses','Januari') }}" required readonly>
                      @error('bulanproses')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="col-3 d-inline">
                      <select class="form-control select2 d-inline" name="tahun" id="tahun" style="width: 100px;">
                        @foreach ($tahun as $item)
                          @if (old('tahun') == $item->tahun)
                            <option value="{{ $item->tahun }}" selected="selected">{{ $item->tahun }}</option>
                          @else
                            <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>

                  </div>
                </div>
              </div>

              <div class="card bg-white kotak2 rounded mb-3">
                <div class="card-header bg-info">
                  <h5 class="card-title"><b>Identitas Jamaah</b></h5>
                </div>
                <div class="card-body">

                  <div class="form-group row">
                    <label for="porsi" class="col-sm-3 col-form-label">Nomor Porsi <span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control @error('porsi') is-invalid @enderror" name="porsi" id="porsi" value="{{ old('porsi') }}" autofocus required>
                    </div>
                    <div class="col-sm-5">
                      <p class="text-danger"><i class="fas fa-long-arrow-alt-left"></i> Wajib Angka 10 Digit</p>
                    </div>
                    @error('porsi')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
  
                  <div class="form-group row">
                    <label for="namajamaah" class="col-sm-3 col-form-label">Nama Jamaah <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('namajamaah') is-invalid @enderror" name="namajamaah" id="namajamaah" value="{{ old('namajamaah') }}" onkeyup="hb1()" required>
                    </div>
                    @error('namajamaah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <label for="bin" class="col-sm-3 col-form-label">Nama Ayah Kandung <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('bin') is-invalid @enderror" name="bin" id="bin" value="{{ old('bin') }}" onkeyup="hb2()" required>
                    </div>
                    @error('bin')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
  
                  <div class="form-group row">
                    <label for="jeniskelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <select class="col-sm-2 form-control custom-select ml-2" name="jeniskelamin" id="jeniskelamin">
                      @foreach ($kelamin as $item)
                        @if (old('jeniskelamin') == $item->kelamin)
                          <option value="{{ $item->kelamin }}" selected="selected">{{ $item->kelamin }}</option>
                        @else
                          <option value="{{ $item->kelamin }}">{{ $item->kelamin }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
  
                  <div class="form-group row">
                    <label for="alamatjamaah" class="col-sm-3 col-form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('alamatjamaah') is-invalid @enderror" name="alamatjamaah" id="alamatjamaah" value="{{ old('alamatjamaah') }}" required>
                    </div>
                    @error('alamatjamaah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
  
                  <div class="form-group row">
                    <label for="kecjamaah" class="col-sm-3 col-form-label">Kecamatan</label>
                    <select class="col-sm-2 form-control custom-select ml-2" name="kecjamaah" id="kecjamaah">
                      @foreach ($kecamatan as $item)
                        @if (old('kecjamaah') == $item->namakecamatan)
                          <option value="{{ $item->namakecamatan }}" selected="selected">{{ $item->namakecamatan }}</option>
                        @else
                          <option value="{{ $item->namakecamatan }}">{{ $item->namakecamatan }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
  
                  <div class="form-group row">
                    <label for="bankjamaah" class="col-sm-3 col-form-label">Nama Bank</label>
                    <select class="col-sm-2 form-control custom-select ml-2" name="bankjamaah" id="bankjamaah">
                      @foreach ($bank as $item)
                        @if (old('bankjamaah') == $item->namabank)
                          <option value="{{ $item->namabank }}" selected="selected">{{ $item->namabank }}</option>
                        @else
                          <option value="{{ $item->namabank }}">{{ $item->namabank }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
  
                  <div class="form-group row">
                    <label for="norekjamaah" class="col-sm-3 col-form-label">Nomor Rekening <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control @error('norekjamaah') is-invalid @enderror" name="norekjamaah" id="norekjamaah" value="{{ old('norekjamaah') }}" required>
                    </div>
                    <div class="col-sm-5">
                      <p class="text-danger"><i class="fas fa-long-arrow-alt-left"></i> Wajib Angka</p>
                    </div>
                    @error('norekjamaah')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
  
                  <div class="form-group row">
                    <label for="spph" class="col-sm-3 col-form-label">Tanggal SPH <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control @error('spph') is-invalid @enderror" name="spph" id="spph" value="{{ old('spph') }}" required>
                    </div>
                    <div class="col-sm-5">
                      <p class="text-danger"><i class="fas fa-long-arrow-alt-left"></i> Contoh : 23 September 2023</p>
                    </div>
                    @error('spph')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                </div>
              </div>

              <div id="waris" class="card bg-white kotak2 rounded mb-3">
                <div class="card-header bg-warning">
                  <h5 class="card-title"><b>Identitas Ahli Waris</b></h5>
                </div>
                <div class="card-body">

                  <div class="form-group row">
                    <label for="namawaris" class="col-sm-3 col-form-label">Nama Ahli Waris <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('namawaris') is-invalid @enderror" name="namawaris" id="namawaris" value="{{ old('namawaris') }}" onkeyup="hb3()" required>
                    </div>
                    @error('namawaris')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <label for="alamatwaris" class="col-sm-3 col-form-label">Alamat Ahli Waris <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('alamatwaris') is-invalid @enderror" name="alamatwaris" id="alamatwaris" value="{{ old('alamatwaris') }}" required>
                    </div>
                    @error('alamatwaris')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
  
                  <div class="form-group row">
                    <label for="kecwaris" class="col-sm-3 col-form-label">Kecamatan Ahli Waris <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control @error('kecwaris') is-invalid @enderror" name="kecwaris" id="kecwaris" value="{{ old('kecwaris') }}" required>
                    </div>
                    @error('kecwaris')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <label for="kabwaris" class="col-sm-3 col-form-label">Kab/Kota Ahli Waris <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control @error('kabwaris') is-invalid @enderror" name="kabwaris" id="kabwaris" value="{{ old('kabwaris','Majalengka') }}" required>
                    </div>
                    @error('kabwaris')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group row">
                    <label for="hubungan" class="col-sm-3 col-form-label">Hubungan Keluarga</label>
                    <select class="col-sm-3 form-control custom-select ml-2" name="hubungan" id="hubungan">
                      @foreach ($hubungan as $item)
                        @if (old('hubungan') == $item->hubungan)
                          <option value="{{ $item->hubungan }}" selected="selected">{{ $item->hubungan }}</option>
                        @else
                          <option value="{{ $item->hubungan }}">{{ $item->hubungan }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
  
                  <div class="form-group row">
                    <label for="bankwaris" class="col-sm-3 col-form-label">Nama Bank</label>
                    <select class="col-sm-2 form-control custom-select ml-2" name="bankwaris" id="bankwaris">
                      @foreach ($bank as $item)
                        @if (old('bankwaris') == $item->namabank)
                          <option value="{{ $item->namabank }}" selected="selected">{{ $item->namabank }}</option>
                        @else
                          <option value="{{ $item->namabank }}">{{ $item->namabank }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
  
                  <div class="form-group row">
                    <label for="norekwaris" class="col-sm-3 col-form-label">Nomor Rekening <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control @error('norekwaris') is-invalid @enderror" name="norekwaris" id="norekwaris" value="{{ old('norekwaris') }}" required>
                    </div>
                    <div class="col-sm-5">
                      <p class="text-danger"><i class="fas fa-long-arrow-alt-left"></i> Wajib Angka</p>
                    </div>
                    @error('norekwaris')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                </div>
              </div>

              <div class="kotak1 rounded mb-3">
                <div class="form-group row mt-3">
                  <label for="ktp" class="col-sm-3 col-form-label" id="noktp"></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control @error('ktp') is-invalid @enderror" name="ktp" id="ktp" value="{{ old('ktp') }}" required>
                  </div>
                  <div class="col-sm-5">
                    <p class="text-danger"><i class="fas fa-long-arrow-alt-left"></i> Wajib Angka</p>
                  </div>
                  @error('ktp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group row">
                  <label for="nohp" class="col-sm-3 col-form-label">Nomor HP Aktif <span class="text-danger">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="nohp" value="{{ old('nohp') }}" required>
                  </div>
                  <div class="col-sm-5">
                    <p class="text-danger"><i class="fas fa-long-arrow-alt-left"></i> Wajib Angka</p>
                  </div>
                  @error('nohp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>

              <div class="card bg-white kotak2 rounded mb-3">
                <div class="card-header bg-success">
                  <h5 class="card-title"><b>Petugas dan Pejabat</b></h5>
                </div>
                <div class="card-body">

                  <div class="mb-3 d-flex justify-content-between">
                    
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="verifikator_id">Nama Petugas</label>
                        <select class="form-control select2" name="verifikator_id" id="verifikator_id" style="width: 80%;">
                          @foreach ($petugas as $item)
                            @if (old('verifikator_id') == $item->id)
                              <option value="{{ $item->id }}" selected="selected">{{ $item->namapetugas }}</option>
                            @else
                              <option value="{{ $item->id }}">{{ $item->namapetugas }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="pejabat_id">Nama Pejabat Penandatangan</label>
                        <select class="form-control select2" name="pejabat_id" id="pejabat_id" style="width: 80%;">
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

                  </div>

                </div>
              </div>

              <div class="d-flex justify-content-around mt-4">
                <a href="/dash/batal" class="btn btn-secondary"><i class="fas fa-undo"></i> Kembali</a>
                <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-location-arrow"></i>
                  Simpan</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="/js/pembatalan.js"></script>
@endsection
