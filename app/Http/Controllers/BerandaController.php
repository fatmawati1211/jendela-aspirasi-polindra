<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Pastikan menggunakan DB facade
use App\Models\Report; // Jika menggunakan model Report

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil laporan dengan status 'selesai' menggunakan model Report
        $laporanpublik = Report::where('status', 'selesai')
            ->where('kategori_privasi', 'publik')  // Pastikan kategori adalah 'publik'
            ->get();

        // Ambil laporan berdasarkan kriteria tertentu menggunakan query builder
        $reports = DB::connection('mysql')
            ->table('reports')
            ->where('kategori_privasi', 'publik') // Ganti 'privat' menjadi 'publik'
            ->where('status', 'selesai')
            ->orderBy('created_at', 'desc')
            ->get();

        // Ambil kategori laporan dan hitung jumlah laporan untuk setiap kategori
        $trendingTopics = DB::connection('mysql')
            ->table('reports')
            ->select('kategori_laporan', DB::raw('count(*) as count'))
            ->where('kategori_privasi', 'publik')
            ->where('status', 'selesai')
            ->groupBy('kategori_laporan')
            ->get();

        // Kirim data ke view beranda
        return view('beranda', compact('laporanpublik', 'reports', 'trendingTopics'));
    }
}

