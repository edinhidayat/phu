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
        Schema::create('agenda_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('agenda')->unique();
            $table->string('tahun');
            $table->string('bulan');
            $table->date('tglregister');
            $table->string('nomoragenda');
            $table->string('porsi')->unique();
            $table->string('namajamaah');
            $table->string('bin');
            $table->foreignId('jeniskelamin_id');
            $table->string('tempatlahir');
            $table->date('tgllahir');
            $table->string('desa');
            $table->foreignId('kecamatan_id');
            $table->foreignId('bank_id');
            $table->date('tglsetor');
            $table->foreignId('pejabat_id');
            $table->foreignId('verifikator_id');
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
        Schema::dropIfExists('agenda_pendaftarans');
    }
};
