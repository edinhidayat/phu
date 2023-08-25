<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (Request::is('dash/pelimpahan*') || Request::is('dash/rekapbatal*') || Request::is('dash/rekappelimpahan*'))
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endif

    <title>{{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/vendor/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/dist/css/adminlte.min.css">
    {{-- SweetAlert2 --}}
    <link rel="stylesheet" href="/css/sweetalert2.min.css">
    @if (Request::is('dash/bank*') ||
            Request::is('dash/agenda*') ||
            Request::is('dash/batal*') ||
            Request::is('dash/pelimpahan*') ||
            Request::is('dash/tahun*') ||
            Request::is('dash/petugas*') ||
            Request::is('dash/user*') ||
            Request::is('dash/rekapbatal*') ||
            Request::is('dash/rekappelimpahan*') ||
            Request::is('dash/pejabat*'))
        <!-- Select2 -->
        <link rel="stylesheet" href="/vendor/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="/vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="/vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="/vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="/vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="/css/mystyle.css">
    @endif
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="/vendor/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        @include('dash.layouts.topbar')

        @include('dash.layouts.sidebar')

        @yield('konten')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="https://hajimajalengka.info" target="_blank">Seksi PHU</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 2.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="/vendor/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/vendor/dist/js/adminlte.js"></script>
    {{-- SweetAlert2 --}}
    <script src="/js/sweetalert2.all.min.js"></script>
    <script src="/js/myscript.js"></script>

    @if (Request::is('dash/bank*') ||
            Request::is('dash/agenda*') ||
            Request::is('dash/batal*') ||
            Request::is('dash/pelimpahan*') ||
            Request::is('dash/tahun*') ||
            Request::is('dash/petugas*') ||
            Request::is('dash/user*') ||
            Request::is('dash/rekapbatal*') ||
            Request::is('dash/rekappelimpahan*') ||
            Request::is('dash/pejabat*'))
        <!-- DataTables  & Plugins -->
        <script src="/vendor/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="/vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="/vendor/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="/vendor/plugins/jszip/jszip.min.js"></script>
        <script src="/vendor/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="/vendor/plugins/pdfmake/vfs_fonts.js"></script>
        <script>
            $(function() {
                $("#example1")
                    .DataTable({
                        responsive: true,
                        lengthChange: false,
                        autoWidth: false,
                        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                    }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");
                $("#example2").DataTable({
                    paging: true,
                    lengthChange: false,
                    searching: true,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                    responsive: true,
                });
                $("#example3").DataTable({
                    paging: true,
                    lengthChange: false,
                    searching: false,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                    responsive: true,
                });
            });
        </script>
    @endif
</body>

</html>
