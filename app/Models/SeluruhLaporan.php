<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeluruhLaporan extends Model
{
    use HasFactory;

    protected $connection = 'mysql'; // Sesuaikan dengan koneksi database jika menggunakan koneksi khusus

    protected $fillable = [
        'judul_laporan',
        'konten_laporan',
        'jenis_laporan',
    ];
}

