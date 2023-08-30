<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash.tahun.v_tahun', [
            'title' => 'Data Tahun',
            'tahuns' => Tahun::orderBy('id','desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.tahun.tambah', [
            'title' => 'Tambah Data Tahun'
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
            'tahun' => 'required|numeric',
            'hijriah' => 'required|numeric',
        ]);

        Tahun::create($validated);
        return redirect('/dash/tahun')->with('suksestambah', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function show(Tahun $tahun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function edit(Tahun $tahun)
    {
        return view('dash.tahun.ubah', [
            'tahun' => $tahun,
            'title' => 'Ubah Data Tahun'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tahun $tahun)
    {
        $validated = $request->validate([
            'tahun' => 'required|numeric',
            'hijriah' => 'required|numeric',
        ]);

        Tahun::where('id', $tahun->id)
            ->update($validated);
        return redirect('/dash/tahun')->with('suksesedit', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tahun $tahun)
    {
        Tahun::destroy($tahun->id);
        return redirect('/dash/tahun')->with('sukseshapus', 'Data Berhasil dihapus!');
    }
}
