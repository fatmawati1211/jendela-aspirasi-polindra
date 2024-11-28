<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaporanPublikController extends Controller
{
    public function index()
    {
        // Mengambil data laporan tanpa syarat kategori, hanya dengan status 'selesai'
        $laporanpublik = Report::where('status', 'selesai')->get();

        // Fetch reports with specific criteria
        $reports = DB::connection('mysql')
            ->table('reports')
            ->where('kategori_privasi', 'publik')
            ->where('status', 'selesai')
            ->orderBy('created_at', 'desc')
            ->get();
    

        // Pass data to the view
        return view('laporanpublik.index', compact('laporanpublik', 'reports'));
    }
}
