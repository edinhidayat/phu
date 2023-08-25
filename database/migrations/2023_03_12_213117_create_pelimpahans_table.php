<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelimpahans', function (Blueprint $table) {
            $table->id();
            $table->string('porsi');
            $table->string('namajamaah');
            $table->string('binjamaah');
            $table->string('ktppenerima');
            $table->string('hppenerima');
            $table->string('namapenerima');
            $table->string('binpenerima');
            $table->string('tmplahir');
            $table->string('jeniskelamin');
            $table->date('tgllahir');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('desa');
            $table->string('kec');
            $table->string('kab');
            $table->string('prov');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->string('shaji');
            $table->string('goldarah');
            $table->string('skawin');
            $table->string('hubungan');
            $table->string('bank');
            $table->string('norek');
            $table->string('ktppemberi');
            $table->string('hppemberi');
            $table->string('namapemberi');
            $table->string('alasanpelimpahan');
            $table->string('tglsurat');
            $table->string('bulanproses');
            $table->foreignId('tahun_id');
            $table->date('tglsuratpermohonan');
            $table->date('tglberitaacara');
            $table->string('proses')->nullable();
            $table->date('tglproses')->nullable();
            $table->foreignId('verifikator_id');
            $table->foreignId('pejabat_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelimpahans');
    }
};
