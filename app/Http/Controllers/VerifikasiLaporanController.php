<?php

namespace App\Http\Controllers;

use App\Models\VerifikasiLaporan;
use Illuminate\Http\Request;

class VerifikasiLaporanController extends Controller
{
    public function index()
    {
        $laporans = VerifikasiLaporan::orderBy('created_at', 'desc')->get();
        return view('admin.laporan-terverifikasi', compact('laporans'));
    }

    public function verifikasi($id)
    {
        $laporan = VerifikasiLaporan::findOrFail($id);
        $laporan->status = 'Sudah Terverifikasi';
        $laporan->save();
        return redirect()->back()->with('success', 'Laporan berhasil diverifikasi.');
    }

    public function hapus($id)
    {
        VerifikasiLaporan::destroy($id);
        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }

    public function terverifikasi()
    {
        // Fetching all reports that have been verified
        $reports = VerifikasiLaporan::where('status', 'Sudah Terverifikasi')->get();

        // Passing the reports to the view
        return view('admin.laporan-terverifikasi', compact('reports'));
    }
    public function laporanDalamAntrian()
    {
        // Fetch all reports with status 'Dalam Antrian'
        $reports = Report::where('status', 'Dalam Antrian')->get();

        // Pass the reports to the view
        return view('admin.laporan-terverifikasi', compact('reports'));
    }
    public function showVerificationPage()
{
    // Ambil laporan dengan status "Dalam Antrian"
    $reports = Report::where('status', 'Dalam Antrian')->get();

    // Cek apakah laporan ada
    if ($reports->isEmpty()) {
        return view('admin.laporan-terverifikasi')->with('message', 'Tidak ada laporan dalam antrian.');
    }

    return view('admin.laporan-terverifikasi', compact('reports'));
}

}
