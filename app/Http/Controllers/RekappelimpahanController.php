<?php

namespace App\Http\Controllers;

use App\Models\Pelimpahan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RekappelimpahanController extends Controller
{
    public function index()
    {
        return view('dash.rekappelimpahan.index', [
            'title' => 'Rekap Pelimpahan'
        ]);
    }

    public function sumber($data)
    {
        return view('dash.rekappelimpahan.sumber', [
            'pengajuan' => Pelimpahan::where('proses', $data)->get()
        ]);
    }

    public function tampilkan($data)
    {
        return view('dash.rekappelimpahan.tampilkan', [
            'tampilkans' => Pelimpahan::where('proses', 'Proses')->where('tglproses', $data)->get()
        ]);
    }

    public function update($ids, $proses, $tgl)
    {
        Pelimpahan::whereIn('id', explode(',', $ids))
            ->update([
                'proses' => $proses,
                'tglproses' => $tgl
            ]);
    }

    public function updatelagi($id, $proses, $tgl)
    {
        Pelimpahan::where('id', $id)
            ->update([
                'proses' => $proses,
                'tglproses' => $tgl
            ]);
    }

    public function cetak()
    {
        $tanggal = request('tgl_tampilkan');
        $dt = [
            'tanggal' => $tanggal,
            'cetak' => Pelimpahan::where('tglproses', $tanggal)->where('proses', 'Proses')->get()
        ];
        $pdf = Pdf::loadView('dash.rekappelimpahan.cetak', $dt)->setPaper('a4', 'landscape');
        return $pdf->stream('cetak.pdf');
    }
}
