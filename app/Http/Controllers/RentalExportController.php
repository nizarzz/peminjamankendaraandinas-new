<?php

namespace App\Http\Controllers;

use App\Exports\RentalsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class RentalExportController extends Controller
{
    public function export(Request $request)
    {
        $filters = $request->only(['search', 'status', 'date_from', 'date_to']);
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\RentalsExport($filters), 'daftar_peminjaman.xlsx');
    }
}
