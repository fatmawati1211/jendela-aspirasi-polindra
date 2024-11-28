<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report; // Make sure you import the Report model

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Get the count of reports from the 'reports' table
        $totalReports = Report::count();
        
        // Get the count of reports with the status 'Dalam Antrian'
        $reportsInQueueCount = Report::where('status', 'Dalam Antrian')->count();
        
        // Get the count of verified reports
        $verifiedReportsCount = Report::where('status', 'Terverifikasi')->count();

        // Fetch the count of reports with 'In Progress' status
        $inProgressCount = Report::where('status', 'Sedang Diproses')->count();
        
        // Return the view and pass the variables
        return view('admin_dashboard', compact('totalReports', 'reportsInQueueCount', 'verifiedReportsCount', 'inProgressCount'));
    }
}
