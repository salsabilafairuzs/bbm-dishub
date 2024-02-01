<?php

namespace App\Models;

use App\Models\JenisKendaraan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kendaraan extends Model
{
    use HasFactory;

    public function jenisKendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class,'jenis_id');
    }
}
