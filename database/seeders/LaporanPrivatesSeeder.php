<?php

namespace Database\Seeders;

use App\Models\LaporanPrivates;
use Illuminate\Database\Seeder;

class LaporanPrivatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    LaporanPrivates::create([
        'nama' => 'Anonim',
        'isi_laporan' => 'Ini adalah contoh laporan private...',
        'foto' => 'path/to/foto.jpg', // Sesuaikan path foto
    ]);
}
}