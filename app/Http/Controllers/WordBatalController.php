<?php

namespace App\Http\Controllers;

use App\Models\Pembatalan;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class WordBatalController extends Controller
{
    public function index($id){
        $data = Pembatalan::find($id);

        Settings::loadConfig();
        $templateProcessor = new TemplateProcessor('SuratBatal.docx');
        
        $templateProcessor->setValue('setoran', $data['setoran']);
        $templateProcessor->setValue('nama', $data['namajamaah']);
        $templateProcessor->setValue('bin', $data['bin']);
        $templateProcessor->setValue('porsi', $data['porsi']);
        $templateProcessor->setValue('jenis_kelamin', $data['jeniskelamin']);
        $templateProcessor->setValue('alamat', $data['alamatjamaah']);
        $templateProcessor->setValue('kecamatan', $data['kecjamaah']);
        $templateProcessor->setValue('bank', $data['bankjamaah']);
        $templateProcessor->setValue('uang', $data['uang']);
        $templateProcessor->setValue('spph', $data['spph']);
        $templateProcessor->setValue('norek', $data['norekjamaah']);
        
        
        $pathToSave = $data['namajamaah'] . ".docx";
        $templateProcessor->saveAs($pathToSave);

        // Settings::setCompatibility(false);
        // Settings::setOutputEscapingEnabled(true);
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        // header("Content-Disposition: attachment; filename=" . $data['namajamaah'] . ".docx");
        header("Content-Type: application/docx");
        header("Content-Transfer-Encoding: binary");
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        return response()->download($data['namajamaah'] . ".docx")->deleteFileAfterSend(true);
    }
}
