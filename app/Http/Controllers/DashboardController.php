<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\LaporanDiproses;
use App\Models\Report;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Pastikan ada view dashboard.blade.php
    }

    public function ubahStatus($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'Sedang Diproses';
        $report->save();
    
        // Memicu event
        event(new LaporanDiproses($report));
    
        return redirect()->back()->with('success', 'Status laporan berhasil diubah dan email notifikasi telah dikirim.');
    }
}
