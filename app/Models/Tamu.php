<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'telp',
        'jabatan',
        'tanggal_datang',
        'tanggal_pulang',
        'keperluan',
        'kesan',
        'pesan'
    ];
}
