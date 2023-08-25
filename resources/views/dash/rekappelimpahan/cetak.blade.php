<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        tr {
            font-family: 'Arial Narrow', Arial, sans-serif;
            font-size: 10pt;
        }
    </style>

    <title>Cetak Rekap Pelimpahan</title>
</head>

<body>

    <a href="/dash/rekappelimpahan" style="text-decoration: none;">
        <p style="font-size: 14pt;color:black;"><b>Daftar Proses Pelimpahan Tanggal
                {{ Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</b></p>
    </a>

    <table class="table">
        <tr>
            <th>No</th>
            <th>porsi</th>
            <th>Nama Jamaah</th>
            <th>Penerima Kuasa</th>
            <th>Alamat</th>
            <th>Pemberi Kuasa</th>
            <th>Hubungan</th>
        </tr>
        @foreach ($cetak as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->porsi }}</td>
                <td><b>{{ $item->namajamaah }}</b><br>({{ $item->alasanpelimpahan }})</td>
                <td><b>{{ $item->namapenerima }}</b><br>{{ $item->jeniskelamin }}<br>{{ $item->hppenerima }}</td>
                <td>Ds {{ $item->desa }}<br>Kec. {{ $item->kec }}<br>{{ $item->kab }}</td>
                <td>{{ $item->namapemberi }}<br>{{ $item->hppemberi }}</td>
                <td>{{ $item->hubungan }}</td>
            </tr>
        @endforeach
    </table>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
