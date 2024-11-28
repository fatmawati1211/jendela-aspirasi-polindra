<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function index() //menampilkan daftar semua laporan
    {
        //Mengambil semua data laporan dari tabel reports dan menampilkannya pada halaman admin.seluruh-laporan
        $reports = Report::all(); //Mengambil semua data laporan dari db dan di kirim ke view seluruh laporan
        return view('admin.seluruh-laporan', compact('reports'));
    }

    public function store(Request $request) //Mengirim laporan baru dan menyimpannya di database
    {
         // Validasi data yang dikirimkan
        $request->validate([
            'kategori_laporan' => 'required|string',
            'deskripsi' => 'required|string',
            'kategori_privasi' => 'required|string',
            'file_terlampir' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,avi,mov|max:20480', // Maksimal 20 MB
        ]);

        // Membuat laporan baru
        $report = new Report();
        $report->kategori_laporan = $request->kategori_laporan;
        $report->deskripsi = $request->deskripsi;
        $report->kategori_privasi = $request->kategori_privasi;
        $report->status = 'Menunggu'; // Status default

        // Menangani file yang diunggah
        if ($request->hasFile('file_terlampir')) {
            $filePath = $request->file('file_terlampir')->store('attachments', 'public');
            $report->file_terlampir = $filePath;
        }

        // Simpan laporan
        $report->save();

            // Arahkan ke dashboard setelah laporan berhasil disimpan
            return redirect()->route('dashboard')->with('success', 'Laporan berhasil dikirim');
        }

    public function destroy($id) //Menghapus laporan dan file terlampirnya
    {
        // Mencari laporan berdasarkan ID
        $report = Report::findOrFail($id);

        // Hapus file terlampir jika ada
        if ($report->file_terlampir) {
            Storage::disk('public')->delete($report->file_terlampir);
        }

        // Hapus laporan dari database
        $report->delete();

        // Arahkan kembali dengan pesan sukses
        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dihapus!');
    }

    public function updateStatus($id, $newStatus)
    {
        // Find the report by ID
        $report = Report::findOrFail($id);
            
        // Update the report status
        $report->status = $newStatus;

        // Save the report
        $report->save();

        // Check if the new status is "Terverifikasi"
        if ($newStatus === 'Terverifikasi') {
            // Redirect to the appropriate page with a success message
            return redirect()->route('admin.laporan-terverifikasi')->with('success');
        }
        // Handle other status updates
        if ($newStatus === 'Selesai') {
            return redirect()->route('admin.laporan-selesai')->with('succes');
        }

        if ($newStatus === 'Sedang Diproses') {
            return redirect()->route('admin.laporan-diproses')->with('success');
        }

        // For default case, stay on the same page
        return redirect()->route('admin.seluruh_laporan')->with('success');

    }

// public function publicReports()
// {
//     $reports = Report::where('status', 'Selesai')->where('kategori_privasi', 'publik')->get();
//     return view('reports.public', compact('reports'));
// }

// public function privateReports()
// {
//     $reports = Report::where('status', 'Selesai')->where('kategori_privasi', 'privat')->get();
//     return view('reports.private', compact('reports'));
// }

// public function terverifikasi()
// {
//     // Mengambil laporan dari tabel 'reports' di database 'jap_db' dengan status 'Dalam Antrian'
//     $reports = DB::connection('jap_db')
//                  ->table('reports')
//                  ->where('status', 'Dalam Antrian')
//                  ->get();
                 
//     return view('admin.laporan-terverifikasi', compact('reports'));
// }
public function showLaporanTerverifikasi()
{
    $reports = Report::where('status', 'Dalam Antrian')->get(); // Or your specific query
    return view('admin.laporan-terverifikasi', compact('reports'));
}


    public function showVerifiedReports()
    {
        // Fetch the count of verified reports
        $verifiedReportsCount = Report::where('status', 'terverifikasi')->count();
    
        // Pass the count to the view
        return view('admin.laporan-terverifikasi', compact('verifiedReportsCount'));
    }

    public function diproses()
    {
        // Ambil laporan yang sudah terverifikasi
        $reports = Report::where('status', 'Terverifikasi')->get();
        
        // Tampilkan laporan yang sudah terverifikasi di halaman admin
        return view('admin.laporan-diproses', compact('reports'));
    }

    public function laporanSelesai()
    {
        return view('admin.laporan-selesai');  // Ensure you include 'admin.' for the folder structure
    }


    public function show($id) //Menampilkan laporan berdasarkan ID atau menampilkan semua laporan jika id adalah 'all'
    {
        if ($id == 'all') {
            // If 'all', display all reports
            $reports = Report::all();
            return view('admin.seluruh-laporan', compact('reports'));
        } else {
            // Show a specific report by ID
            $report = Report::findOrFail($id);
            return view('reports.show', compact('report'));
        }
    }

    public function showPublicReports()
    {
        // Fetch reports from the 'jap_db' connection where kategori_privasi is 'publik', ordered by 'created_at' descending
        $reports = Report::on('jap_db')
                        ->where('kategori_privasi', 'publik')
                        ->orderBy('created_at', 'desc') // Sort by created_at in descending order
                        ->get();
    
        // Pass the reports to the view and include a message if no reports are found
        return view('laporanpublik.index', [
            'reports' => $reports,
            'message' => $reports->isEmpty() ? 'No public reports available.' : null // Conditionally set the message
        ]);
    }
    
    public function showPrivatReports()
    {
        // Fetch reports from the 'jap_db' connection where kategori_privasi is 'publik', ordered by 'created_at' descending
        $reports = Report::on('jap_db')
                        ->where('kategori_privasi', 'privat')
                        ->orderBy('created_at', 'desc') // Sort by created_at in descending order
                        ->get();
    
        // Pass the reports to the view and include a message if no reports are found
        return view('laporan_privates.index', [
            'reports' => $reports,
            'message' => $reports->isEmpty() ? 'No privat reports available.' : null // Conditionally set the message
        ]);
    }
}
