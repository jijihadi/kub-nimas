<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomor',
        'tanggal',
        'tanggal_masuk',
        'tanggal_keluar',
        'perihal_masuk',
        'perihal_keluar',
        'tujuan_masuk',
        'tujuan_keluar',
        'tindak_lanjut',
        'keterangan'
    ];
}
