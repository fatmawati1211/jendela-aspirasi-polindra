<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class SeluruhLaporanController extends Controller
{
    public function index()
    {
        // Get all reports ordered by the most recent (descending order)
        $reports = Report::orderBy('created_at', 'desc')->get();
        
        // Send data to the view
        return view('admin.seluruh-laporan', compact('reports'));
    }
}
