<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uraian',
        'tanggal',
        'banyaknya',
        'harga_satuan',
        'masuk',
        'keluar',
        'saldo'
    ];
}
