<?php

namespace App\Http\Controllers;

use App\Models\Report; // Impor model Report
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin_dashboard'); // Nama file sesuai yang diinginkan
    }
    public function updateStatus(Request $request, $id)
    {
        $laporan = Report::find($id);

        if (!$laporan) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan');
        }

        $laporan->status = 'terverifikasi';
        $laporan->save();

        return redirect()->route('admin.laporan-terverifikasi')->with('success', 'Status berhasil diubah');
    }
    
    public function showLaporanTerverifikasi()
    {
        $reports = Report::where('status', 'Dalam Antrian')->get(); // Or your specific query
        return view('admin.laporan-terverifikasi', compact('reports'));
    }
}