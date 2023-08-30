<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AwalController extends Controller
{
    public function index()
    {
        $tanggal = date('Y-m-d');
        $jason = file_get_contents('https://api.banghasan.com/sholat/format/json/jadwal/kota/690/tanggal/' . $tanggal);
        $data = json_decode($jason, true);
        
        $jasonmp3 = file_get_contents('https://raw.githubusercontent.com/penggguna/QuranJSON/master/quran.json');
        $datamp3 = json_decode($jasonmp3, true);

        return view('home',[
            'title' => 'Seksi PHU Majalengka',
            'jadwal' => $data['jadwal']['data'],
            'mp3' => $datamp3
        ]);
    }

    public function surat()
    {
        $jsonquran = file_get_contents('https://equran.id/api/v2/surat');
        $surat = json_decode($jsonquran, true);
        
        return view('surat',[
            'title' => "Al-Qur'an Digital",
            'surah' => $surat['data']
        ]);
    }

    public function baca($id)
    {
        $jsonquran = file_get_contents('https://equran.id/api/v2/surat/' . $id);
        $surat = json_decode($jsonquran, true);

        $jsontafsir = file_get_contents('https://equran.id/api/v2/tafsir/' . $id);
        $tafsir = json_decode($jsontafsir, true);

        return view('baca',[
            'title' => "Al-Qur'an Digital",
            'surah' => $surat['data'],
            'ayat' => $surat['data']['ayat'],
            'tafsir' => $tafsir['data']
        ]);
    }
}
