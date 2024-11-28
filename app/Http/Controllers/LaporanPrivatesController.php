<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Report;

class LaporanPrivatesController extends Controller
{
    public function index()
    {
        // Fetch reports with 'selesai' status
        $laporan_privates = Report::where('status', 'selesai')->get();

        // Fetch reports with specific criteria
        $reports = DB::connection('mysql')
            ->table('reports')
            ->where('kategori_privasi', 'privat')
            ->where('status', 'selesai')
            ->orderBy('created_at', 'desc')
            ->get();
    

        // Pass data to the view
        return view('laporan_privates.index', compact('laporan_privates', 'reports'));
    }
}
