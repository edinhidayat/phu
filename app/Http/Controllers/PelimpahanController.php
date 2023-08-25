<?php

namespace App\Http\Controllers;

use App\Models\AhliWaris;
use App\Models\AlasanPelimpahan;
use App\Models\Bank;
use App\Models\Bulan;
use App\Models\JenisKelamin;
use App\Models\Pejabat;
use App\Models\Pekerjaan;
use App\Models\Pelimpahan;
use App\Models\Pendidikan;
use App\Models\Province;
use App\Models\StatusNikah;
use App\Models\Verifikator;
use App\Rules\Uppercase;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelimpahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash.pelimpahan.v_pelimpahan',[
            'pelimpahans' => Pelimpahan::orderBy('id','desc')->with(['verifikator','pejabat','tahun'])->get(),
            'title' => 'Data Pelimpahan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.pelimpahan.tambah',[
            'title' => 'Tambah Data Pelimpahan',
            'alasan' => AlasanPelimpahan::all(),
            'bulans' => Bulan::all(),
            'tahuns' => DB::table('tahuns')->orderBy('id', 'desc')->get(),
            'kelamins' => JenisKelamin::all(),
            'hubungans' => AhliWaris::all(),
            'pekerjaans' => Pekerjaan::all(),
            'pendidikans' => Pendidikan::all(),
            'goldarah' => DB::table('gol_darahs')->orderBy('id', 'desc')->get(),
            'shaji' => DB::table('status_hajis')->orderBy('id', 'desc')->get(),
            'skawin' => StatusNikah::all(),
            'bank' => Bank::all(),
            'petugas' => Verifikator::all(),
            'pejabat' => Pejabat::all(),
            'provinsi' => Province::all()
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
            'porsi' => 'required|min:10|max:10|unique:pelimpahans',
            'namajamaah' => ['required','string', new Uppercase],
            'binjamaah' => 'required|uppercase',
            'ktppenerima' => 'required|numeric',
            'hppenerima' => 'required|numeric',
            'namapenerima' => 'required|uppercase',
            'binpenerima' => 'required|uppercase',
            'tmplahir' => 'required',
            'jeniskelamin' => 'required',
            'tgllahir' => 'required',
            'alamat' => 'required',
            'rt' => 'required|min:3|max:3',
            'rw' => 'required|min:3|max:3',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'prov' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'shaji' => 'required',
            'goldarah' => 'required',
            'skawin' => 'required',
            'hubungan' => 'required',
            'bank' => 'required',
            'norek' => 'required|numeric',
            'ktppemberi' => 'required|numeric',
            'hppemberi' => 'required|numeric',
            'namapemberi' => 'required|uppercase',
            'alasanpelimpahan' => 'required',
            'tglsurat' => 'required',
            'bulanproses' => 'required',
            'tahun_id' => 'required',
            'tglsuratpermohonan' => 'required',
            'tglberitaacara' => 'required',
            'proses' => 'nullable',
            'tglproses' => 'nullable',
            'verifikator_id' => 'required',
            'pejabat_id' => 'required'
        ]);
        
        Pelimpahan::create($validasi);
        return redirect('/dash/pelimpahan')->with('suksestambah', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelimpahan  $pelimpahan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelimpahan $pelimpahan)
    {
        if ($pelimpahan->alasanpelimpahan == "Meninggal Dunia") {
            $pdf = Pdf::loadview('dash.cetak.pelimpahanwafat',[
                'pelimpahan' => $pelimpahan
            ]);
            return $pdf->stream('pelimpahanwafat.pdf');
        }
        
        $pdf = Pdf::loadview('dash.cetak.pelimpahansakit',[
            'pelimpahan' => $pelimpahan
        ]);
        return $pdf->stream('pelimpahansakit.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelimpahan  $pelimpahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelimpahan $pelimpahan)
    {
        return view('dash.pelimpahan.ubah',[
            'title' => 'Ubah Data Pelimpahan',
            'pelimpahan' => $pelimpahan,
            'alasan' => AlasanPelimpahan::all(),
            'bulans' => Bulan::all(),
            'tahuns' => DB::table('tahuns')->orderBy('id', 'desc')->get(),
            'kelamins' => JenisKelamin::all(),
            'hubungans' => AhliWaris::all(),
            'pekerjaans' => Pekerjaan::all(),
            'pendidikans' => Pendidikan::all(),
            'goldarah' => DB::table('gol_darahs')->orderBy('id', 'desc')->get(),
            'shaji' => DB::table('status_hajis')->orderBy('id', 'desc')->get(),
            'skawin' => StatusNikah::all(),
            'bank' => Bank::all(),
            'petugas' => Verifikator::all(),
            'pejabat' => Pejabat::all(),
            'provinsi' => Province::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelimpahan  $pelimpahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelimpahan $pelimpahan)
    {
        $rules = ([
            'namajamaah' => ['required','string', new Uppercase],
            'binjamaah' => 'required|uppercase',
            'ktppenerima' => 'required|numeric',
            'hppenerima' => 'required|numeric',
            'namapenerima' => 'required|uppercase',
            'binpenerima' => 'required|uppercase',
            'tmplahir' => 'required',
            'jeniskelamin' => 'required',
            'tgllahir' => 'required',
            'alamat' => 'required',
            'rt' => 'required|min:3|max:3',
            'rw' => 'required|min:3|max:3',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'prov' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'shaji' => 'required',
            'goldarah' => 'required',
            'skawin' => 'required',
            'hubungan' => 'required',
            'bank' => 'required',
            'norek' => 'required|numeric',
            'ktppemberi' => 'required|numeric',
            'hppemberi' => 'required|numeric',
            'namapemberi' => 'required|uppercase',
            'alasanpelimpahan' => 'required',
            'tglsurat' => 'required',
            'bulanproses' => 'required',
            'tahun_id' => 'required',
            'tglsuratpermohonan' => 'required',
            'tglberitaacara' => 'required',
            'proses' => 'nullable',
            'tglproses' => 'nullable',
            'verifikator_id' => 'required',
            'pejabat_id' => 'required'
        ]);

        if ($request->porsi != $pelimpahan->porsi) {
            $rules['porsi'] = 'required|min:10|max:10|unique:pelimpahans';
        }

        $validasi = $request->validate($rules);

        Pelimpahan::where('id', $pelimpahan->id)
            ->update($validasi);
        return redirect('/dash/pelimpahan')->with('suksesedit', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelimpahan  $pelimpahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelimpahan $pelimpahan)
    {
        Pelimpahan::destroy($pelimpahan->id);
        return redirect('/dash/pelimpahan')->with('sukseshapus', 'Data Berhasil dihapus!');
    }
}
