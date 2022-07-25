<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kub extends Model
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
        'jumlah_anggota',
        'kelas',
        'noreg_skt',
        'noreg_pupi',
        'id_ketua'
    ];
}
