<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash.bank.v_bank', [
            'title' => 'Data Bank',
            'banks' => Bank::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.bank.tambahbank', [
            'title' => 'Tambah Data Bank'
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
            'kodebank' => 'required|unique:banks|min:3|max:3',
            'namabank' => 'required',
        ]);

        Bank::create($validated);
        return redirect('/dash/bank')->with('suksestambah', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('dash.bank.editbank', [
            'bank' => $bank,
            'title' => 'Ubah Data Bank'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $rules = ([
            'namabank' => 'required',
        ]);

        if ($request->kodebank != $bank->kodebank) {
            $rules['kodebank'] = 'required|unique:banks|min:3|max:3';
        }

        $validated = $request->validate($rules);

        Bank::where('id', $bank->id)
            ->update($validated);
        return redirect('/dash/bank')->with('suksesedit', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        Bank::destroy($bank->id);
        return redirect('/dash/bank')->with('sukseshapus', 'Data Berhasil dihapus!');
    }
}
