<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $connection = 'jap_db';
    
    protected $fillable = [
        'kategori_laporan',
        'deskripsi',
        'file_terlampir',
        'kategori_privasi',
        'status'
    ];

    // Accessor untuk mendapatkan URL file terlampir
    public function getFileTerlampirUrlAttribute()
    {
        return $this->file_terlampir ? Storage::url($this->file_terlampir) : null;
    }
}
