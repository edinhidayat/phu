<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Bulan;
use App\Models\Pejabat;
use App\Rules\Uppercase;
use App\Models\AhliWaris;
use App\Models\Kecamatan;
use App\Models\Pembatalan;
use App\Models\Verifikator;
use App\Models\JenisKelamin;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\AlasanPembatalan;
use Illuminate\Support\Facades\DB;

class PembatalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash.pembatalan.v_pembatalan', [
            'pembatalans' => Pembatalan::orderBy('id','desc')->get(),
            'title' => 'Data Pembatalan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.pembatalan.tambah', [
            'title' => 'Tambah Data Pembatalan',
            'alasanpembatalan' => AlasanPembatalan::all(),
            'bulans' => Bulan::all(),
            'tahun' => DB::table('tahuns')->orderBy('id', 'desc')->get(),
            'kelamin' => JenisKelamin::all(),
            'kecamatan' => Kecamatan::all(),
            'bank' => Bank::all(),
            'hubungan' => AhliWaris::all(),
            'petugas' => Verifikator::all(),
            'pejabat' => Pejabat::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'porsi' => 'required|min:10|max:10|unique:pembatalans',
            'ktp' => 'required|numeric',
            'namajamaah' => ['required','string', new Uppercase],
            'bin' => 'required|uppercase',
            'jeniskelamin' => 'required',
            'alamatjamaah' => 'required',
            'kecjamaah' => 'required',
            'bankjamaah' => 'required',
            'norekjamaah' => 'required|numeric',
            'spph' => 'required',
            'namawaris' => 'required|uppercase',
            'alamatwaris' => 'required',
            'kecwaris' => 'required',
            'kabwaris' => 'required',
            'hubungan' => 'nullable',
            'nohp' => 'required|numeric',
            'bankwaris' => 'nullable',
            'norekwaris' => 'required|numeric',
            'alasanpembatalan' => 'required',
            'setoran' => 'required',
            'uang' => 'required',
            'bulanangka' => 'required',
            'bulanproses' => 'required',
            'tahun' => 'required',
            'proses' => 'nullable',
            'tglproses' => 'nullable',
            'verifikator_id' => 'required',
            'pejabat_id' => 'required'
        ]);

        Pembatalan::create($validasi);
        return redirect('/dash/batal')->with('suksestambah', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembatalan  $pembatalan
     * @return \Illuminate\Http\Response
     */
    public function show($pembatalan)
    {
        $pembatalan = Pembatalan::find($pembatalan);

        if ($pembatalan->alasanpembatalan == "Meninggal Dunia") {
            $pdf = Pdf::loadview('dash.cetak.batalwafat',[
                'pembatalan' => $pembatalan
            ]);
            return $pdf->stream('batalwafat.pdf');
        }
        
        $pdf = Pdf::loadview('dash.cetak.batalpribadi',[
            'pembatalan' => $pembatalan
        ]);
        return $pdf->stream('batalpribadi.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembatalan  $pembatalan
     * @return \Illuminate\Http\Response
     */
    public function edit($pembatalan)
    {
        return view('dash.pembatalan.ubah', [
            'title' => 'Ubah Data Pembatalan',
            'pembatalan' => Pembatalan::find($pembatalan),
            'alasanpembatalan' => AlasanPembatalan::all(),
            'bulans' => Bulan::all(),
            'tahun' => DB::table('tahuns')->orderBy('id', 'desc')->get(),
            'kelamin' => JenisKelamin::all(),
            'kecamatan' => Kecamatan::all(),
            'bank' => Bank::all(),
            'hubungan' => AhliWaris::all(),
            'petugas' => Verifikator::all(),
            'pejabat' => Pejabat::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembatalan  $pembatalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pembatalan)
    {
        $pembatalan = Pembatalan::find($pembatalan);
        $rules = ([
            'ktp' => 'required|numeric',
            'namajamaah' => ['required','string', new Uppercase],
            'bin' => 'required|uppercase',
            'jeniskelamin' => 'required',
            'alamatjamaah' => 'required',
            'kecjamaah' => 'required',
            'bankjamaah' => 'required',
            'norekjamaah' => 'required|numeric',
            'spph' => 'required',
            'namawaris' => 'required|uppercase',
            'alamatwaris' => 'required',
            'kecwaris' => 'required',
            'kabwaris' => 'required',
            'hubungan' => 'nullable',
            'nohp' => 'required|numeric',
            'bankwaris' => 'nullable',
            'norekwaris' => 'required|numeric',
            'alasanpembatalan' => 'required',
            'setoran' => 'required',
            'uang' => 'required',
            'bulanangka' => 'required',
            'bulanproses' => 'required',
            'tahun' => 'required',
            'proses' => 'nullable',
            'tglproses' => 'nullable',
            'verifikator_id' => 'required',
            'pejabat_id' => 'required'
        ]);

        if ($request->porsi != $pembatalan->porsi) {
            $rules['porsi'] = 'required|min:10|max:10|unique:pembatalans';
        }

        $validasi = $request->validate($rules);

        Pembatalan::where('id', $pembatalan->id)
            ->update($validasi);
        return redirect('/dash/batal')->with('suksesedit', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembatalan  $pembatalan
     * @return \Illuminate\Http\Response
     */
    public function destroy($pembatalan)
    {
        $pembatalan = Pembatalan::find($pembatalan);
        Pembatalan::destroy($pembatalan->id);
        return redirect('/dash/batal')->with('sukseshapus', 'Data Berhasil dihapus!');
    }
}
