@extends('dash.layouts.main')

@section('konten')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="overflow-x: hidden;">

        <div class="card mt-3" style="border-bottom: 1px solid #bebebe">
            <div class="card-title p-3">
                Rekapitulasi Pembatalan
            </div>
        </div>

        <div class="card mt-3 bg-secondary">
            <div class="card-body p-0 pb-3">
                <div class="row">
                    <div class="col-lg-5 mt-3 ml-3">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-info mb-3" type="submit" onclick="update()">Input
                                &nbsp;<i class="fas fa-share"></i></button>
                        </div>

                        <table id="example3" class="table table-striped bg-light">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="checked-all"></th>
                                    <th>Porsi</th>
                                    <th>Nama Jamaah</th>
                                </tr>
                            </thead>
                            <tbody id="sumberdata"></tbody>
                        </table>
                    </div>
                    <div class="col-lg-6 mt-3 ml-3">
                        <form action="/dash/cetakrb">
                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Pilih Tanggal</span>
                                </div>
                                <input type="date" name="tgl_tampilkan" id="tgl_tampilkan" class="form-control"
                                    value="{{ date('Y-m-d') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button" onclick="tampilkan()">Tampilkan &nbsp;<i
                                            class="fas fa-sync-alt"></i></button>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-warning" type="submit">Cetak &nbsp;<i
                                            class="fas fa-print"></i></button>
                                </div>
                            </div>
                        </form>

                        <table class="table table-striped bg-light">
                            <thead>
                                <tr>
                                    <th width="30px;">#</th>
                                    <th width="80px;">Porsi</th>
                                    <th>Nama Jamaah</th>
                                    <th width="50px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="rekap-jamaah"></tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="../../../js/jquery-3.6.4.min.js"></script>
    <script>
        // Pilih semua Check Button
        $('.checked-all').on('change', function(e) {
            e.preventDefault()
            $('input[name=pilih]').prop('checked', this.checked)
        })

        $(document).ready(function() {
            datasumber();
            tampilkan();
        })

        // Data Sumber
        function datasumber() {
            let pengajuan = "Pengajuan"
            // Objek Ajax
            let xhr = new XMLHttpRequest()
            // Cek Kesiapan Ajax
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    $('#sumberdata').html(xhr.responseText);
                }
            }

            // Eksekusi Ajax
            xhr.open('get', '/dash/rekapbatal/proses/' + pengajuan, true)
            xhr.send()
            tampilkan()
        }

        // Tampilkan Data di Tabel Rekap Proses
        function tampilkan() {
            let tanggal_tampilkan = $('#tgl_tampilkan').val()

            // Objek Ajax
            let xhr = new XMLHttpRequest()
            // Cek Kesiapan Ajax
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    $('#rekap-jamaah').html(xhr.responseText);
                }
            }

            // Eksekusi Ajax
            xhr.open('get', '/dash/rekapbatal/' + tanggal_tampilkan, true)
            xhr.send()
        }

        // Update data untuk diProses
        function update(id, proses, tgl) {
            let teksproses = "Proses"
            let tgl_proses = $('#tgl_tampilkan').val()
            let allValues = []

            $('.subcheck:checked').each(function() {
                allValues.push($(this).attr('data-id'))
            })
            let ids = allValues.join(',')

            $.ajax({
                url: "{{ url('dash/rekapbatal/edit') }}/" + ids + "/" + teksproses + "/" + tgl_proses,
                type: 'get',
                success: function(data) {
                    tampilkan();
                    datasumber();
                }
            })
        }

        // Update data untuk kembali lagi Pengajuan
        $('#rekap-jamaah').on('click', '#updatelagi', function() {
            let idValue = $(this).val()
            updatelagi()

            function updatelagi(id, proses, tgl) {
                let teksproses = "Pengajuan"
                let tanggal = $('#tgl_tampilkan').val()

                $.ajax({
                    url: "{{ url('dash/rekapbatal/ubah') }}/" + idValue + "/" + teksproses + "/" + tanggal,
                    type: 'get',
                    success: function(data) {
                        datasumber();
                        tampilkan();
                    }
                })
            }
        })
    </script>
@endsection
