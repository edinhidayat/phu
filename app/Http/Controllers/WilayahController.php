<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function getkabupaten(Request $request)
    {
        $id_prov = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_prov)->get();

        $optionn = "<option>Pilih Kabupaten...</option>";
        foreach ($kabupatens as $kab) {
            $optionn .= "<option data-nama='$kab->name' value='$kab->id'>$kab->name</option>";
        }
        echo $optionn;
    }

    public function getkecamatan(Request $request)
    {
        $id_kab = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kab)->get();

        $optionn = "<option>Pilih Kecamatan...</option>";
        foreach ($kecamatans as $kec) {
            $optionn .= "<option data-nama='$kec->name' value='$kec->id'>$kec->name</option>";
        }
        echo $optionn;
    }

    public function getkelurahan(Request $request)
    {
        $id_kel = $request->id_kecamatan;

        $kelurahans = Village::where('district_id', $id_kel)->get();

        $optionn = "<option>Pilih Desa...</option>";
        foreach ($kelurahans as $kelurahan) {
            $optionn .= "<option data-nama='$kelurahan->name' value='$kelurahan->id'>$kelurahan->name</option>";
        }
        echo $optionn;
    }
}
