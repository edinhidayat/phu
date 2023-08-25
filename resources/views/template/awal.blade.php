<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../img/logokemenag.png">
        <title>{{ $title }}</title>

        {{-- CSS SLICK CAROUSEL --}}
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

        {{-- CSS BOOTSTRAP --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        {{-- CSS --}}
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>

        
        @include('template.navbar')

        <div style="padding-top: 50px;">
            @yield('konten')
        </div>
    
        <footer>
            <div class="row">
                <div class="col-md-4 text-white text-center pt-5">
                    <img src="../img/logokemenag.png" width="150" alt="Logo Kemenag">
                    <h5 class="mt-3">Kantor Kementerian Agama</h5>
                    <h6>Kabupaten Majalengka</h6>
                </div>
                <div class="col-md-4 text-white pt-5 ms-5">
                    <h5 class="mb-4">Link :</h5>
                    <p><a href="https://kemenag.go.id/" target="_blank" class="text-decoration-none text-white"><i class="bi bi-globe2"></i>&nbsp; Kementerian Agama RI</a></p>
                    <p><a href="https://haji.kemenag.go.id/v4/" target="_blank" class="text-decoration-none text-white"><i class="bi bi-globe2"></i>&nbsp; Dirjen PHU Kemenag RI</a></p>
                    <p><a href="https://jabar.kemenag.go.id/en/" target="_blank" class="text-decoration-none text-white"><i class="bi bi-globe2"></i>&nbsp; Kanwil Kemenag Prov. Jabar</a></p>
                    <p><a href="https://majalengka.kemenag.go.id/" target="_blank" class="text-decoration-none text-white"><i class="bi bi-globe2"></i>&nbsp; Kantor Kemenag Kab. Majalengka</a></p>
                </div>
                <div class="col-md-3 text-white pt-5 pb-5 ms-5">
                    <h5>Media Sosial :</h5>
                    <a href="https://www.youtube.com/@kemenagmajalengka" target="_blank" class="text-decoration-none text-white fs-5 me-3"><i class="bi bi-youtube"></i>&nbsp;</a>
                    <a href="https://www.facebook.com/kemenagmajalengka" target="_blank" class="text-decoration-none text-white fs-5 me-3"><i class="bi bi-facebook"></i>&nbsp;</a>
                    <a href="https://www.instagram.com/kemenag_majalengka/" target="_blank" class="text-decoration-none text-white fs-5 me-3"><i class="bi bi-instagram"></i>&nbsp;</a>
                    <a href="https://www.tiktok.com/@kemenagmajalengka" target="_blank" class="text-decoration-none text-white fs-5"><i class="bi bi-tiktok"></i>&nbsp;</a>
                </div>
            </div>
            <div class="row mt-5 bg-success" style="border-top: 3px solid greenyellow;">
                <div class="col-md">
                    <h6 class="text-center text-muted my-4"><span class="text-white">Seksi PHU Majalengka @2023</span></h6>
                </div>
            </div>
        </footer>

    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.1.min.js" integrity="sha256-UnTxHm+zKuDPLfufgEMnKGXDl6fEIjtM+n1Q6lL73ok=" crossorigin="anonymous"></script>

    {{-- JS SLICK CAROUSEL --}}
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    {{-- JAVASCRIPT BOOTSTRAP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="../js/script.js"></script>

    @if (Request::is('/'))
    <script src="../js/putar.js"></script>
    @endif
    @if (Request::is('surat/*'))
    <script src="../../js/murottal.js"></script>
    @endif
    </body>
</html>