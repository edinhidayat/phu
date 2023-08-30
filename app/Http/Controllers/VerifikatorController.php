<?php

namespace App\Http\Controllers;

use App\Models\Verifikator;
use Illuminate\Http\Request;

class VerifikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash.petugas.v_petugas', [
            'verifikators' => Verifikator::all(),
            'title' => 'Data Petugas'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.petugas.tambah', [
            'title' => 'Tambah Data Petugas'
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
            'namapetugas' => 'required',
            'nippetugas' => 'required|min:18|max:18',
        ]);

        Verifikator::create($validated);
        return redirect('/dash/petugas')->with('suksestambah', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Verifikator  $verifikator
     * @return \Illuminate\Http\Response
     */
    public function show(Verifikator $verifikator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Verifikator  $verifikator
     * @return \Illuminate\Http\Response
     */
    // public function edit(Verifikator $verifikator)
    public function edit($verifikator)
    {
        return view('dash.petugas.ubah', [
            'petugas' => Verifikator::find($verifikator),
            'title' => 'Ubah Data Petugas'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Verifikator  $verifikator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $verifikator)
    {
        $validated = $request->validate([
            'namapetugas' => 'required',
            'nippetugas' => 'required|min:18|max:18'
        ]);

        Verifikator::where('id', $verifikator)
            ->update($validated);
        return redirect('/dash/petugas')->with('suksesedit', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Verifikator  $verifikator
     * @return \Illuminate\Http\Response
     */
    public function destroy($verifikator)
    {
        Verifikator::destroy($verifikator);
        return redirect('/dash/petugas')->with('sukseshapus', 'Data Berhasil dihapus!');
    }
}
