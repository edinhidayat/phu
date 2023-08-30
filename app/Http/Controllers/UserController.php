<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash.users.v_user', [
            'users' => User::all(),
            'title' => 'Data Users'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash.users.tambah', [
            'penggunas' => Pengguna::all(),
            'title' => 'Tambah Data User'
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
            'nama' => 'required|max:200',
            'username' => 'required|unique:users|min:4',
            'password' => 'required|min:6|max:12',
            'pengguna_id' => 'required',
            'active' => 'required'
        ]);

        // Enkripsi Password
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);
        return redirect('/dash/user')->with('suksestambah', 'Data Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dash.users.ubah', [
            'user' => $user,
            'penggunas' => Pengguna::all(),
            'title' => 'Ubah Data Bank'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'nama' => 'required|max:200',
            'pengguna_id' => 'required',
            'active' => 'required'
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users|min:4';
        }
        if ($request->password != $user->password) {
            $rules['password']  = 'required|min:6';
            // Enkripsi Password
            $rules['password'] = Hash::make($rules['password']);
        }

        $validated = $request->validate($rules);

        User::where('id', $user->id)
            ->update($validated);
        return redirect('/dash/user')->with('suksestambah', 'Data Berhasil diUbah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dash/user')->with('sukseshapus', 'Data Berhasil dihapus!');
    }
}
