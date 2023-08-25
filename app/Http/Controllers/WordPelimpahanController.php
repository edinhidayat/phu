<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pelimpahan;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class WordPelimpahanController extends Controller
{
    public function index($id){
        $data = Pelimpahan::find($id);
        
        Settings::loadConfig();
        $templateProcessor = new TemplateProcessor('Pelimpahan.docx');

        $templateProcessor->setValue('alasan_pelimpahan', $data['alasanpelimpahan']);
        $templateProcessor->setValue('porsi', $data['porsi']);
        $templateProcessor->setValue('nama', $data['namajamaah']);
        $templateProcessor->setValue('bin', $data['binjamaah']);
        $templateProcessor->setValue('suket', $data['tglsurat']);
        $templateProcessor->setValue('nama_waris', $data['namapenerima']);
        $templateProcessor->setValue('bin_waris', $data['binpenerima']);
        $templateProcessor->setValue('tempat', $data['tmplahir']);
        $templateProcessor->setValue('tanggal_lahir', Carbon::parse($data['tgllahir'])->translatedFormat('d F Y'));
        $templateProcessor->setValue('alamat', $data['alamat']);
        $templateProcessor->setValue('rt', $data['rt']);
        $templateProcessor->setValue('rw', $data['rw']);
        $templateProcessor->setValue('desa', $data['desa']);
        $templateProcessor->setValue('kecamatan', $data['kec']);
        $templateProcessor->setValue('kota', $data['kab']);
        $templateProcessor->setValue('provinsi', $data['prov']);
        $templateProcessor->setValue('hubungan', $data['hubungan']);

        
        $pathToSave = $data["namajamaah"] . '.docx';
        $templateProcessor->saveAs($pathToSave);
        
        // Settings::setCompatibility(false);
        // Settings::setOutputEscapingEnabled(true);
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        // header("Content-Disposition: attachment; filename=" . $data['namajamaah'] . ".docx");
        header("Content-Type: application/docx");
        header("Content-Transfer-Encoding: binary");
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        return response()->download($data["namajamaah"] . '.docx')->deleteFileAfterSend(true);
    }
}
