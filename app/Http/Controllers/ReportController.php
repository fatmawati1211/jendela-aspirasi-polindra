<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'description' => 'required|string',
            'privacy' => 'nullable|string',
        ]);

        // Logic untuk menyimpan laporan
        // ...

        return redirect()->back()->with('success', 'Laporan berhasil dikirim.');
    }
}
