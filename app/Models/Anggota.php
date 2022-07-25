<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'alamat',
        'jabatan',
        'pendidikan',
        'usia',
        'usaha_utama',
        'usaha_sampingan',
        'jumlah_perahu',
        'jenis_alat',
        'keterangan'
    ];
}
