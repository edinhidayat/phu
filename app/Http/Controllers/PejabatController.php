<?php

namespace App\Http\Controllers;

use App\Models\GolPangkat;
use App\Models\Pejabat;
use Illuminate\Http\Request;

class PejabatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash.pejabat.v_pejabat', [
            'pejabats' => Pejabat::all(),
            'title' => 'Data Pejabat'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.pejabat.tambah', [
            'gols' => GolPangkat::all(),
            'title' => 'Tambah Data Pejabat'
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
            'gelardepan' => 'nullable',
            'namapejabat' => 'required',
            'gelarbelakang' => 'nullable',
            'nippejabat' => 'required|min:18|max:18',
            'gol' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required'
        ]);

        Pejabat::create($validated);
        return redirect('/dash/pejabat')->with('suksestambah', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pejabat  $pejabat
     * @return \Illuminate\Http\Response
     */
    public function show(Pejabat $pejabat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pejabat  $pejabat
     * @return \Illuminate\Http\Response
     */
    public function edit($pejabat)
    {
        return view('dash.pejabat.ubah', [
            'pejabat' => Pejabat::find($pejabat),
            'gols' => GolPangkat::all(),
            'title' => 'Ubah Data Pejabat'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pejabat  $pejabat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pejabat)
    {
        $validated = $request->validate([
            'gelardepan' => 'nullable',
            'namapejabat' => 'required',
            'gelarbelakang' => 'nullable',
            'nippejabat' => 'required|min:18|max:18',
            'gol' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required'
        ]);

        Pejabat::where('id', $pejabat)
            ->update($validated);
        return redirect('/dash/pejabat')->with('suksesedit', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pejabat  $pejabat
     * @return \Illuminate\Http\Response
     */
    public function destroy($pejabat)
    {
        Pejabat::destroy($pejabat);
        return redirect('/dash/pejabat')->with('sukseshapus', 'Data Berhasil dihapus!');
    }
}
