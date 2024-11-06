<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports'; // Menentukan nama tabel jika tidak mengikuti konvensi

    // Daftar kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'kategori_laporan',
        'file_terlampir',
        'deskripsi',
        'kategori_privasi',
    ];
}
