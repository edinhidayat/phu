<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Pejabat;
use App\Models\Kecamatan;
use App\Models\Verifikator;
use App\Models\JenisKelamin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgendaPendaftaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jeniskelamin()
    {
        return $this->belongsTo(JenisKelamin::class);
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
    public function verifikator()
    {
        return $this->belongsTo(Verifikator::class);
    }
    public function pejabat()
    {
        return $this->belongsTo(Pejabat::class);
    }
}
