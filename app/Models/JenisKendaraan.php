<?php

namespace App\Models;

use App\Models\Kendaraan;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisKendaraan extends Model
{
    use HasFactory;

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
