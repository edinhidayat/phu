<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembatalan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function verifikator()
    {
        return $this->belongsTo(Verifikator::class);
    }
    public function pejabat()
    {
        return $this->belongsTo(Pejabat::class);
    }
}
