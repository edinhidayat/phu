<?php

namespace App\Models;

use App\Models\AgendaPendaftaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisKelamin extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function agendapendaftaran()
    {
        return $this->hasMany(AgendaPendaftaran::class);
    }
}