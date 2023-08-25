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
              <li class="breadcrumb-item"><a href="/dash/pelimpahan">Pelimpahan</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <style>
      div.kotak2{
        box-shadow: 3px 3px 7px rgba(0, 0, 0, .5);
      }
    </style>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-10">

            <form class="mb-5" action="/dash/pelimpahan" method="post">
              @csrf

              <div class="card bg-white kotak2 rounded mb-3">
                <h5 class="card-header bg-dark">Input Data Pelimpahan</h5>
                <div class="card-body">

                  <div class="form-row">
                    <div class="col-md-3 mb-2">
                      <label for="tglproses">Tanggal Pengajuan</label>
                      <input type="hidden" name="proses" id="proses" value="Pengajuan">
                      <input type="date" class="form-control bg-warning @error('tglproses') is-invalid @enderror" name="tglproses" id="tglproses" value="{{ date('Y-m-d') }}" readonly required>
                    </div>

                    <div class="col-md-3 mb-2">
                      <label for="alasanpelimpahan">Alasan Pelimpahan <span class="text-danger">*</span></label>
                      <select class="custom-select" name="alasanpelimpahan" id="alasanpelimpahan" required>
                        @foreach ($alasan as $item)
                          @if (old('alasanpelimpahan') == $item->alasan)
                            <option value="{{ $item->alasan }}" selected="selected">{{ $item->alasan }}</option>
                          @else
                            <option value="{{ $item->alasan }}">{{ $item->alasan }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-5 mb-2">
                      <label for="tglsurat">Tanggal Surat Ket Dokter/Akta Kematian <span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('tglsurat') is-invalid @enderror" name="tglsurat" id="tglsurat" value="{{ old('tglsurat') }}" autofocus required>
                      <div class="text-muted">
                        <i>Tulis Lengkap. Cth : 23 September 2023</i>
                      </div>
                    </div>

                    <div class="col-md-3 mb-3">
                      <label for="bulanproses">Bulan Proses <span class="text-danger">*</span></label>
                      <select class="custom-select" name="bulanproses" id="bulanproses" required>
                        @foreach ($bulans as $item)
                          @if (old('bulanproses') == $item->namabulan)
                            <option value="{{ $item->namabulan }}" selected="selected">{{ $item->namabulan }}</option>
                          @else
                            <option value="{{ $item->namabulan }}">{{ $item->namabulan }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-3 mb-3">
                      <label for="tahun_id">Tahun <span class="text-danger">*</span></label>
                      <select class="custom-select" name="tahun_id" id="tahun_id" required>
                        @foreach ($tahuns as $item)
                          @if (old('tahun_id') == $item->id)
                            <option value="{{ $item->id }}" selected="selected">{{ $item->hijriah }} H / {{ $item->tahun }} M</option>
                          @else
                            <option value="{{ $item->id }}">{{ $item->hijriah }} H / {{ $item->tahun }} M</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-2 mb-3">
                      <label for="porsi">Nomor Porsi <span class="text-danger">*</span></label>
                      <input type="text" class="form-control iAngka @error('porsi') is-invalid @enderror" name="porsi" id="porsi" value="{{ old('porsi') }}" onkeypress="return hanyaAngka(event)" required>
                      @error('porsi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="col-md-5 mb-3">
                      <label for="namajamaah">Nama Jamaah <span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('namajamaah') is-invalid @enderror" name="namajamaah" id="namajamaah" value="{{ old('namajamaah') }}" onkeyup="hb1()" required>
                      @error('namajamaah')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    <div class="col-md-5 mb-3">
                      <label for="binjamaah">Bin / Binti <span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('binjamaah') is-invalid @enderror" name="binjamaah" id="binjamaah" value="{{ old('binjamaah') }}" onkeyup="hb2()" required>
                      @error('binjamaah')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>

                </div>
              </div>

              <div class="card bg-white kotak2 rounded mb-3">
                <div class="card-body">

                  <div class="form-row">
                    <div class="col-md-3">
                      <label for="tglsuratpermohonan">Tgl Surat Permohonan <span class="text-danger">*</span></label>
                      <input type="date" class="form-control @error('tglsuratpermohonan') is-invalid @enderror" name="tglsuratpermohonan" id="tglsuratpermohonan" value="{{ old('tglsuratpermohonan') }}" required>
                      @error('tglsuratpermohonan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-3">
                      <label for="tglberitaacara">Tanggal Berita Acara <span class="text-danger">*</span></label>
                      <input type="date" class="form-control @error('tglberitaacara') is-invalid @enderror" name="tglberitaacara" id="tglberitaacara" value="{{ old('tglberitaacara',date('Y-m-d')) }}" required>
                      @error('tglberitaacara')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <hr style="border: 1px solid rgb(143, 143, 143)">

                  <div class="form-row">
                    <div class="col-md-3 mb-3">
                      <label for="ktppenerima">Nomor KTP Penerima <span class="text-danger">*</span></label>
                      <input type="text" class="form-control iAngka @error('ktppenerima') is-invalid @enderror" name="ktppenerima" id="ktppenerima" value="{{ old('ktppenerima') }}" onkeypress="return hanyaAngka(event)" required>
                      @error('ktppenerima')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="hppenerima">Nomor HP Penerima <span class="text-danger">*</span></label>
                      <input type="text" class="form-control iAngka @error('hppenerima') is-invalid @enderror" name="hppenerima" id="hppenerima" value="{{ old('hppenerima') }}" onkeypress="return hanyaAngka(event)" required>
                      @error('hppenerima')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-5 mb-3">
                      <label for="namapenerima">Nama Ahli Waris Penerima <span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('namapenerima') is-invalid @enderror" name="namapenerima" id="namapenerima" value="{{ old('namapenerima') }}" onkeyup="hb3()" required>
                      @error('namapenerima')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-5 mb-3">
                      <label for="binpenerima">Nama Ayah Kandung <span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('binpenerima') is-invalid @enderror" name="binpenerima" id="binpenerima" value="{{ old('binpenerima') }}" onkeyup="hb4()" required>
                      @error('binpenerima')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-2 mb-3">
                      <label for="jeniskelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                      <select class="custom-select" name="jeniskelamin" id="jeniskelamin" required>
                        @foreach ($kelamins as $item)
                          @if (old('jeniskelamin') == $item->kelamin)
                            <option value="{{ $item->kelamin }}" selected="selected">{{ $item->kelamin }}</option>
                          @else
                            <option value="{{ $item->kelamin }}">{{ $item->kelamin }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-3 mb-3">
                      <label for="tmplahir">Tempat Lahir <span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('tmplahir') is-invalid @enderror" name="tmplahir" id="tmplahir" value="{{ old('tmplahir') }}" required>
                      @error('tmplahir')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="tgllahir">Tanggal Lahir <span class="text-danger">*</span></label>
                      <input type="date" class="form-control @error('tgllahir') is-invalid @enderror" name="tgllahir" id="tgllahir" value="{{ old('tgllahir') }}" required>
                      @error('tgllahir')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="hubungan">Hubungan dengan Jamaah <span class="text-danger">*</span></label>
                      <select class="custom-select" name="hubungan" id="hubungan" required>
                        @foreach ($hubungans as $item)
                          @if (old('hubungan') == $item->hubungan)
                            <option value="{{ $item->hubungan }}" selected="selected">{{ $item->hubungan }}</option>
                          @else
                            <option value="{{ $item->hubungan }}">{{ $item->hubungan }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="alamat">Alamat <span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') }}" required>
                      @error('alamat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-1 mb-3">
                      <label for="rt">RT <span class="text-danger">*</span></label>
                      <input type="text" class="form-control iAngka @error('rt') is-invalid @enderror" name="rt" id="rt" value="{{ old('rt') }}" onkeypress="return hanyaAngka(event)" required>
                      @error('rt')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-1 mb-3">
                      <label for="rw">RW <span class="text-danger">*</span></label>
                      <input type="text" class="form-control iAngka @error('rw') is-invalid @enderror" name="rw" id="rw" value="{{ old('rw') }}" onkeypress="return hanyaAngka(event)" required>
                      @error('rw')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="desa">Desa/Kelurahan <span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('desa') is-invalid @enderror" name="desa" id="desa" value="{{ old('desa') }}" readonly required>
                      @error('desa')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="kec">Kecamatan <span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('kec') is-invalid @enderror" name="kec" id="kec" value="{{ old('kec') }}" readonly required>
                      @error('kec')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="kab">Kabupaten/Kota <span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('kab') is-invalid @enderror" name="kab" id="kab" value="{{ old('kab') }}" readonly required>
                      @error('kab')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="prov">Provinsi <span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('prov') is-invalid @enderror" name="prov" id="prov" value="{{ old('prov') }}" readonly required>
                      @error('prov')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-1">
                      <label class="text-white">Pilih</label>
                      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#staticBackdrop">...</button>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-3 mb-3">
                      <label for="pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
                      <select class="custom-select" name="pekerjaan" id="pekerjaan" required>
                        @foreach ($pekerjaans as $item)
                          @if (old('pekerjaan') == $item->namapekerjaan)
                            <option value="{{ $item->namapekerjaan }}" selected="selected">{{ $item->namapekerjaan }}</option>
                          @else
                            <option value="{{ $item->namapekerjaan }}">{{ $item->namapekerjaan }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="pendidikan">Pendidikan <span class="text-danger">*</span></label>
                      <select class="custom-select" name="pendidikan" id="pendidikan" required>
                        @foreach ($pendidikans as $item)
                          @if (old('pendidikan') == $item->jenjang)
                            <option value="{{ $item->jenjang }}" selected="selected">{{ $item->jenjang }}</option>
                          @else
                            <option value="{{ $item->jenjang }}">{{ $item->jenjang }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-2 mb-3">
                      <label for="goldarah">Gol Darah <span class="text-danger">*</span></label>
                      <select class="custom-select" name="goldarah" id="goldarah" required>
                        @foreach ($goldarah as $item)
                          @if (old('goldarah') == $item->goldarah)
                            <option value="{{ $item->goldarah }}" selected="selected">{{ $item->goldarah }}</option>
                          @else
                            <option value="{{ $item->goldarah }}">{{ $item->goldarah }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="skawin">Status Perkawinan <span class="text-danger">*</span></label>
                      <select class="custom-select" name="skawin" id="skawin" required>
                        @foreach ($skawin as $item)
                          @if (old('skawin') == $item->status)
                            <option value="{{ $item->status }}" selected="selected">{{ $item->status }}</option>
                          @else
                            <option value="{{ $item->status }}">{{ $item->status }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="shaji">Status Haji <span class="text-danger">*</span></label>
                      <select class="custom-select" name="shaji" id="shaji" required>
                        @foreach ($shaji as $item)
                          @if (old('shaji') == $item->status)
                            <option value="{{ $item->status }}" selected="selected">{{ $item->status }}</option>
                          @else
                            <option value="{{ $item->status }}">{{ $item->status }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-3 mb-3">
                      <label for="bank">Nama Bank <span class="text-danger">*</span></label>
                      <select class="custom-select" name="bank" id="bank" required>
                        @foreach ($bank as $item)
                          @if (old('bank') == $item->namabank)
                            <option value="{{ $item->namabank }}" selected="selected">{{ $item->namabank }}</option>
                          @else
                            <option value="{{ $item->namabank }}">{{ $item->namabank }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="norek">Nomor Rekening <span class="text-danger">*</span></label>
                      <input type="text" class="form-control iAngka @error('norek') is-invalid @enderror" name="norek" id="norek" value="{{ old('norek') }}" onkeypress="return hanyaAngka(event)" required>
                      @error('norek')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <hr style="border: 1px solid rgb(143, 143, 143)">

                  <div class="form-row">
                    <div class="col-md-3 mb-3">
                      <label for="ktppemberi">KTP Pemberi Kuasa <span class="text-danger">*</span></label>
                      <input type="text" class="form-control iAngka @error('ktppemberi') is-invalid @enderror" name="ktppemberi" id="ktppemberi" value="{{ old('ktppemberi') }}" onkeypress="return hanyaAngka(event)" required>
                      @error('ktppemberi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                      <label for="hppemberi">HP Pemberi Kuasa <span class="text-danger">*</span></label>
                      <input type="text" class="form-control iAngka @error('hppemberi') is-invalid @enderror" name="hppemberi" id="hppemberi" value="{{ old('hppemberi') }}" onkeypress="return hanyaAngka(event)" required>
                      @error('hppemberi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-md-5 mb-3">
                      <label for="namapemberi">Nama Pemberi Kuasa <span class="text-danger">*</span></label>
                      <input type="text" class="form-control @error('namapemberi') is-invalid @enderror" name="namapemberi" id="namapemberi" value="{{ old('namapemberi') }}" onkeyup="hb5()" required>
                      @error('namapemberi')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>

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
                <a href="/dash/pelimpahan" class="btn btn-secondary"><i class="fas fa-undo"></i> Kembali</a>
                <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-location-arrow"></i>
                  Simpan</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
  </div>

  {{-- MODAL WILAYAH --}}
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Wilayah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form>
        <div class="form-group row">
          <label for="provinsi" class="col-sm-4 col-form-label">Provinsi</label>
          <div class="col-sm-8">
            <select class="custom-select" name="provinsi" id="provinsi">
              <option>Pilih Provinsi...</option>
              @foreach ($provinsi as $item)
                <option data-nama="{{ $item->name }}" value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="kabupaten" class="col-sm-4 col-form-label">Kabupaten</label>
          <div class="col-sm-8">
            <select class="custom-select" name="kabupaten" id="kabupaten">
              {{-- isi otomatis --}}
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="kecamatan" class="col-sm-4 col-form-label">Kecamatan</label>
          <div class="col-sm-8">
            <select class="custom-select" name="kecamatan" id="kecamatan">
              {{-- isi otomatis --}}
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="kelurahan" class="col-sm-4 col-form-label">Desa/Kelurahan</label>
          <div class="col-sm-8">
            <select class="custom-select" name="kelurahan" id="kelurahan">
              {{-- isi otomatis --}}
            </select>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="simpanalamat" data-dismiss="modal">Ok</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="/js/jquery-3.6.4.min.js"></script>
<script src="/js/pelimpahan.js"></script>
@endsection
