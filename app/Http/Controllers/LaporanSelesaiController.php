<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class LaporanSelesaiController extends Controller
{
    public function index()
    {
        // Ambil laporan dengan status 'Sedang Diproses'
        $reports = Report::where('status', 'Sedang Diproses')
            ->orderBy('created_at', 'desc')
            ->get();
            
        // Kirim data laporan ke view
        return view('admin.laporan-selesai', compact('reports'));
    }
}
