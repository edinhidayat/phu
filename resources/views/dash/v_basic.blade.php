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
              <li class="breadcrumb-item"><a href="/dash/basic">Setings</a></li>
              <li class="breadcrumb-item active">Basic</li>
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
          <div class="col d-flex justify-content-around" style="flex-wrap: wrap;">

            <div class="card card-row card-primary mb-4" style="width: 18rem;">
              <div class="card-header">
                <h2 class="card-title">
                  <b>Golongan Darah</b>
                </h2>
              </div>
              <div class="card-body">
                @foreach ($golongandarah as $goldarah)
                  <table style="border=0;">
                    <tr>
                      <td class="pr-2">{{ $goldarah->goldarah }}</td>
                    </tr>
                  </table>
                @endforeach
              </div>
            </div>

            <div class="card card-row card-primary mb-4" style="width: 18rem;">
              <div class="card-header">
                <h2 class="card-title">
                  <b>Status Nikah</b>
                </h2>
              </div>
              <div class="card-body">
                @foreach ($statusnikahs as $statusnikah)
                  <table style="border=0;">
                    <tr>
                      <td class="pr-2">{{ $statusnikah->status }}</td>
                    </tr>
                  </table>
                @endforeach
              </div>
            </div>

            <div class="card card-row card-primary mb-4" style="width: 18rem;">
              <div class="card-header">
                <h2 class="card-title">
                  <b>Status Haji</b>
                </h2>
              </div>
              <div class="card-body">
                @foreach ($statushajis as $statushaji)
                  <table style="border=0;">
                    <tr>
                      <td class="pr-2">{{ $statushaji->status }}</td>
                    </tr>
                  </table>
                @endforeach
              </div>
            </div>

            <div class="card card-row card-primary mb-4" style="width: 18rem;">
              <div class="card-header">
                <h2 class="card-title">
                  <b>Jenis Kelamin</b>
                </h2>
              </div>
              <div class="card-body">
                @foreach ($jeniskelamin as $jk)
                  <table style="border=0;">
                    <tr>
                      <td class="pr-2">{{ $loop->iteration }}.</td>
                      <td>{{ $jk->kelamin }}</td>
                    </tr>
                  </table>
                @endforeach
              </div>
            </div>

            <div class="card card-row card-primary mb-4" style="width: 18rem;">
              <div class="card-header">
                <h2 class="card-title">
                  <b>Pengguna</b>
                </h2>
              </div>
              <div class="card-body">
                @foreach ($penggunas as $pengguna)
                  <table style="border=0;">
                    <tr>
                      <td class="pr-2">{{ $loop->iteration }}.</td>
                      <td>{{ $pengguna->pengguna }}</td>
                    </tr>
                  </table>
                @endforeach
              </div>
            </div>

            <div class="card card-row card-primary mb-4" style="width: 18rem;">
              <div class="card-header">
                <h2 class="card-title">
                  <b>Ahli Waris</b>
                </h2>
              </div>
              <div class="card-body">
                @foreach ($ahliwaris as $waris)
                  <table style="border=0;">
                    <tr>
                      <td class="pr-2">{{ $loop->iteration }}.</td>
                      <td>{{ $waris->hubungan }}</td>
                    </tr>
                  </table>
                @endforeach
              </div>
            </div>

            <div class="card card-row card-primary mb-4" style="width: 18rem;">
              <div class="card-header">
                <h2 class="card-title">
                  <b>Pendidikan</b>
                </h2>
              </div>
              <div class="card-body">
                @foreach ($pendidikan as $jenjang)
                  <table style="border=0;">
                    <tr>
                      <td class="pr-2">{{ $jenjang->jenjang }}</td>
                    </tr>
                  </table>
                @endforeach
              </div>
            </div>

            <div class="card card-row card-primary mb-4" style="width: 18rem;">
              <div class="card-header">
                <h2 class="card-title">
                  <b>Kecamatan</b>
                </h2>
              </div>
              <div class="card-body">
                @foreach ($kecamatans as $kec)
                  <table style="border=0;">
                    <tr>
                      <td>{{ $loop->iteration }}.</td>
                      <td class="pl-2">{{ $kec->namakecamatan }}</td>
                    </tr>
                  </table>
                @endforeach
              </div>
            </div>

            <div class="card card-row card-primary mb-4" style="width: 18rem;">
              <div class="card-header">
                <h2 class="card-title">
                  <b>Pekerjaan</b>
                </h2>
              </div>
              <div class="card-body">
                @foreach ($pekerjaan as $kerja)
                  <table style="border=0;">
                    <tr>
                      <td class="pr-2">{{ $kerja->namapekerjaan }}</td>
                    </tr>
                  </table>
                @endforeach
              </div>
            </div>

            <div class="card card-row card-primary mb-4" style="width: 18rem;">
              <div class="card-header">
                <h2 class="card-title">
                  <b>Gol / Pangkat</b>
                </h2>
              </div>
              <div class="card-body">
                @foreach ($golpangkats as $item)
                  <table style="border=0;">
                    <tr>
                      <td>{{ $loop->iteration }}.</td>
                      <td class="pl-2">{{ $item->gol }}</td>
                      <td class="pl-2">{{ $item->pangkat }}</td>
                    </tr>
                  </table>
                @endforeach
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
