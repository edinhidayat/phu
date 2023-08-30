<?php

namespace App\Http\Controllers;

use App\Models\AhliWaris;
use App\Models\GolDarah;
use App\Models\GolPangkat;
use App\Models\JenisKelamin;
use App\Models\Kecamatan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Pengguna;
use App\Models\StatusHaji;
use App\Models\StatusNikah;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function index()
    {
        return view('dash.v_basic', [
            'title' => 'Basic Settings',
            'golongandarah' => GolDarah::all(),
            'statusnikahs' => StatusNikah::all(),
            'statushajis' => StatusHaji::all(),
            'jeniskelamin' => JenisKelamin::all(),
            'ahliwaris' => AhliWaris::all(),
            'pendidikan' => Pendidikan::all(),
            'kecamatans' => Kecamatan::all(),
            'pekerjaan' => Pekerjaan::all(),
            'penggunas' => Pengguna::all(),
            'golpangkats' => GolPangkat::all(),
        ]);
    }
}
