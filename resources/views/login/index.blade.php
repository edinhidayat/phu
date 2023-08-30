<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../../img/logokemenag.png">
  <title>{{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vendor/plugins/fontawesome-free/css/all.min.css">
  {{-- SweetAlert2 --}}
  <link rel="stylesheet" href="/css/sweetalert2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vendor/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
@if(session()->has('gagal'))
    <div class="gagal"></div>
@endif
@if(session()->has('keluar'))
    <div class="keluar"></div>
@endif
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/login" class="h1"><b>Silakan</b> Login</a>
    </div>
    <div class="card-body">
      <form action="/login" method="post">
        @csrf
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="Username" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>          
        <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
        <a href="/" class="btn btn-warning btn-block mt-3">Kembali</a>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="vendor/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
{{-- SweetAlert2 --}}
<script src="/js/sweetalert2.all.min.js"></script>
<!-- AdminLTE App -->
<script src="vendor/dist/js/adminlte.min.js"></script>
<script src="/js/myscript.js"></script>
</body>
</html>
