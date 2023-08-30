<?php

namespace App\Http\Controllers;

use App\Models\AgendaPendaftaran;
use App\Models\Bank;
use App\Models\Bulan;
use App\Models\Tahun;
use App\Models\Pejabat;
use App\Models\Kecamatan;
use App\Models\Verifikator;
use App\Models\JenisKelamin;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendaPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash.agenda.v_agenda', [
            'pendaftarans' => AgendaPendaftaran::orderBy('id', 'desc')->with(['jeniskelamin', 'kecamatan', 'bank', 'verifikator', 'pejabat'])->get(),
            'title' => 'Agenda Pendaftaran'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.agenda.tambah', [
            'bulans' => Bulan::all(),
            'tahuns' => DB::table('tahuns')->orderBy('id', 'desc')->get(),
            'pendaftarans' => AgendaPendaftaran::orderBy('id', 'desc')->get(),
            'jeniskelamin' => JenisKelamin::all(),
            'kecamatan' => Kecamatan::all(),
            'bank' => Bank::all(),
            'verifikator' => DB::table('verifikators')->orderBy('id', 'desc')->get(),
            'pejabat' => Pejabat::all(),
            'bulanini' => new DateTime(),
            'title' => 'Tambah Agenda Pendaftaran'
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
        $validated = $request->validate([
            'agenda' => 'required|unique:agenda_pendaftarans',
            'nomoragenda' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'tglregister' => 'required',
            'porsi' => 'required|min:10|max:10|unique:agenda_pendaftarans',
            'namajamaah' => 'required',
            'bin' => 'required',
            'jeniskelamin_id' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'desa' => 'required',
            'kecamatan_id' => 'required',
            'bank_id' => 'required',
            'tglsetor' => 'required',
            'verifikator_id' => 'required',
            'pejabat_id' => 'required'
        ]);

        AgendaPendaftaran::create($validated);
        return redirect('/dash/agenda')->with('suksestambah', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AgendaPendaftaran  $agendaPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(AgendaPendaftaran $agendaPendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AgendaPendaftaran  $agendaPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit($agendaPendaftaran)
    {
        return view('dash.agenda.ubah', [
            'agenda'=>AgendaPendaftaran::find($agendaPendaftaran),
            'bulans' => Bulan::all(),
            'tahuns' => DB::table('tahuns')->orderBy('id', 'desc')->get(),
            'pendaftarans' => AgendaPendaftaran::latest()->get(),
            'jeniskelamin' => JenisKelamin::all(),
            'kecamatan' => Kecamatan::all(),
            'bank' => Bank::all(),
            'verifikator' => DB::table('verifikators')->orderBy('id', 'desc')->get(),
            'pejabat' => Pejabat::all(),
            'bulanini' => new DateTime(),
            'title' => 'Ubah Agenda Pendaftaran'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AgendaPendaftaran  $agendaPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $agendaPendaftaran)
    {
        $agendaPendaftaran = AgendaPendaftaran::find($agendaPendaftaran);
        $rules = ([
            'nomoragenda' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'tglregister' => 'required',
            'namajamaah' => 'required',
            'bin' => 'required',
            'jeniskelamin_id' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'desa' => 'required',
            'kecamatan_id' => 'required',
            'bank_id' => 'required',
            'tglsetor' => 'required',
            'verifikator_id' => 'required',
            'pejabat_id' => 'required'
        ]);

        if ($request->agenda != $agendaPendaftaran->agenda) {
            $rules['agenda'] = 'required|unique:agenda_pendaftarans';
        }
        if ($request->porsi != $agendaPendaftaran->porsi) {
            $rules['porsi'] = 'required|min:10|max:10|unique:agenda_pendaftarans';
        }

        $validated = $request->validate($rules);

        AgendaPendaftaran::where('id', $agendaPendaftaran->id)
            ->update($validated);
        return redirect('/dash/agenda')->with('suksesedit', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AgendaPendaftaran  $agendaPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($agendaPendaftaran)
    {
        $agendaPendaftaran = AgendaPendaftaran::find($agendaPendaftaran);
        AgendaPendaftaran::destroy($agendaPendaftaran->id);
        return redirect('/dash/agenda')->with('sukseshapus', 'Data Berhasil dihapus!');
    }
}
