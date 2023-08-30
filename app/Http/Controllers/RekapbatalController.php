<?php

namespace App\Http\Controllers;


use App\Models\Pembatalan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RekapbatalController extends Controller
{
    public function index()
    {
        return view('dash.rekapbatal.index', [
            'title' => 'Rekap Pembatalan'
        ]);
    }

    public function sumber($data)
    {
        return view('dash.rekapbatal.sumber', [
            'pengajuan' => Pembatalan::where('proses', $data)->get()
        ]);
    }

    public function tampilkan($data)
    {
        return view('dash.rekapbatal.tampilkan', [
            'tampilkans' => Pembatalan::where('proses', 'Proses')->where('tglproses', $data)->get()
        ]);
    }

    public function update($ids, $proses, $tgl)
    {
        Pembatalan::whereIn('id', explode(',', $ids))
            ->update([
                'proses' => $proses,
                'tglproses' => $tgl
            ]);
    }

    public function updatelagi($id, $proses, $tgl)
    {
        Pembatalan::where('id', $id)
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
            'cetak' => Pembatalan::where('tglproses', $tanggal)->where('proses', 'Proses')->get()
        ];
        $pdf = Pdf::loadView('dash.rekapbatal.cetak', $dt);
        return $pdf->stream('cetak.pdf');
    }
}
