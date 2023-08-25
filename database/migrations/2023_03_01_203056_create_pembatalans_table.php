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
        Schema::create('pembatalans', function (Blueprint $table) {
            $table->id();
            $table->string('porsi')->unique();
            $table->string('ktp');
            $table->string('namajamaah');
            $table->string('bin');
            $table->string('jeniskelamin');
            $table->string('alamatjamaah');
            $table->string('kecjamaah');
            $table->string('bankjamaah');
            $table->string('norekjamaah');
            $table->string('spph');
            $table->string('namawaris');
            $table->string('alamatwaris');
            $table->string('kecwaris');
            $table->string('kabwaris');
            $table->string('hubungan')->nullable();
            $table->string('nohp');
            $table->string('bankwaris')->nullable();
            $table->string('norekwaris');
            $table->string('alasanpembatalan');
            $table->string('setoran');
            $table->string('uang');
            $table->string('bulanangka');
            $table->string('bulanproses');
            $table->string('tahun');
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
        Schema::dropIfExists('pembatalans');
    }
};
