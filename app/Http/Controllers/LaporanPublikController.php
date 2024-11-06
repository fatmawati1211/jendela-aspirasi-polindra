<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; // Tambahkan baris ini untuk mengimpor DB facade

class LaporanPublikController extends Controller
{
    public function index()
    {
        // Mengambil semua data laporan dari tabel 'reports' menggunakan Query Builder
        $laporanpublik = DB::table('reports')->get();

        // Data trending topics contoh (biasanya dihitung dari database)
        $trendingTopics = [
            'Bullying' => '5,220 posts',
            'UKT Mahal' => '1,182 posts',
            'Pencemaran Nama Baik' => '231 rb posts',
            'Pelecehan' => '34,6 rb posts',
            'Fasilitas Rusak' => '20,7 rb posts'
        ];

        return view('laporanpublik.index', compact('laporanpublik', 'trendingTopics'));
    }
}
