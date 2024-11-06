<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'kategori_laporan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori_privasi' => 'required|in:public,private',
            'file_terlampir' => 'nullable|file|max:2048', // Sesuaikan aturan file
        ]);

        // Jika ada file, simpan dan ambil nama filenya
        if ($request->hasFile('file_terlampir')) {
            $filePath = $request->file('file_terlampir')->store('reports', 'public');
            $validatedData['file_terlampir'] = $filePath; // Simpan path file
        }

        // Simpan laporan ke dalam database
        Report::create($validatedData);

        return redirect()->back()->with('status', 'Laporan berhasil dikirim!');
    }

    public function index()
    {
        // Fetch reports that are marked as 'public' in the database
        $reports = Report::where('kategori_privasi', 'public')->get();

        // Pass reports data to the view
        return view('laporanpublik.view.index', compact('reports'));
    }
}
