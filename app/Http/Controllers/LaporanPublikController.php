<?php

// app/Http/Controllers/LaporanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPublikController extends Controller
{
    public function index()
    {
        // Data laporan contoh (biasanya diambil dari database)
        $laporanpublik = [
            [
                'username' => 'Anonim',
                'tanggal' => 'October 20, 2024 at 8:16 pm',
                'isi' => 'Spiffing good time burke give us a bell...',
                'gambar' => 'path/to/image.jpg'
            ],
            // Tambahkan laporanpublik lainnya sesuai kebutuhan
        ];

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

