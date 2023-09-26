<?php

namespace App\Http\Controllers;

use App\Exports\QuotationExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportCustomerAsCsv()
    {
        return Excel::download(new QuotationExport(), 'exported-data.xlsx');
    }
}
