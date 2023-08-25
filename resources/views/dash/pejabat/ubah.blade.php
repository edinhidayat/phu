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
              <li class="breadcrumb-item active">Ubah</li>
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

            <form action="/dash/pejabat/{{ $pejabat->id }}" method="post">
              @method('put')
              @csrf
              <div class="row mb-3">
                <div class="col">
                  <label for="gelardepan" class="form-label">Gelar Depan</label>
                  <input type="text" class="form-control @error('gelardepan') is-invalid @enderror" name="gelardepan"
                    id="gelardepan" value="{{ old('gelardepan', $pejabat->gelardepan) }}" autofocus>
                  @error('gelardepan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col">
                  <label for="gelarbelakang" class="form-label">Gelar Belakang</label>
                  <input type="text" class="form-control @error('gelarbelakang') is-invalid @enderror"
                    name="gelarbelakang" id="gelarbelakang" value="{{ old('gelarbelakang', $pejabat->gelarbelakang) }}">
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
                  id="namapejabat" value="{{ old('namapejabat', $pejabat->namapejabat) }}" required>
                @error('namapejabat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="nippejabat" class="form-label">NIP Pejabat</label>
                <input type="text" class="form-control @error('nippejabat') is-invalid @enderror" name="nippejabat"
                  id="nippejabat" value="{{ old('nippejabat', $pejabat->nippejabat) }}" required>
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
                      @if (old('gol', $pejabat->gol) == $item->gol)
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
                    id="pangkat" value="{{ old('pangkat', $pejabat->pangkat) }}" readonly>
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
                  id="jabatan" value="{{ old('jabatan', $pejabat->jabatan) }}" required>
                @error('jabatan')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="d-flex justify-content-between">
                <a href="/dash/pejabat" class="btn btn-secondary"><i class="fas fa-undo"></i> Kembali</a>
                <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-location-arrow"></i>
                  Ubah</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
  </div>



{{-- Pilihan Golongan Jabatan (Pejabat) --}}
<script>
  const gol = document.getElementById("gol");
  gol.addEventListener("change", function (e) {
      let pangkat = document.getElementById("pangkat");
      const namagol = e.target.value;
      let namaPangkat = "";
      switch (namagol) {
          case "I/a":
              namaPangkat = "Juru Muda";
              break;
          case "I/b":
              namaPangkat = "Juru Muda Tk.I";
              break;
          case "I/c":
              namaPangkat = "Juru";
              break;
          case "I/d":
              namaPangkat = "Juru Tk.I";
              break;
          case "II/a":
              namaPangkat = "Pengatur Muda";
              break;
          case "II/b":
              namaPangkat = "Pengatur Muda Tk.I";
              break;
          case "II/c":
              namaPangkat = "Pengatur";
              break;
          case "II/d":
              namaPangkat = "Pengatur Tk.I";
              break;
          case "III/a":
              namaPangkat = "Penata Muda";
              break;
          case "III/b":
              namaPangkat = "Penata Muda Tk.I";
              break;
          case "III/c":
              namaPangkat = "Penata";
              break;
          case "III/d":
              namaPangkat = "Penata Tk.I";
              break;
          case "IV/a":
              namaPangkat = "Pembina";
              break;
          case "IV/b":
              namaPangkat = "Pembina Tk.I";
              break;
          case "IV/c":
              namaPangkat = "Pembina Muda";
              break;
          case "IV/d":
              namaPangkat = "Pembina Madya";
              break;
          case "IV/e":
              namaPangkat = "Pembina Utama";
              break;
          default:
              namaPangkat = "Juru Muda";
      }
  
      pangkat.value = namaPangkat;
  });
</script>


@endsection
