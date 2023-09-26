<?php

namespace App\Http\Controllers;

use App\Imports\ImportBranch;
use App\Imports\ImportCenter;
use App\Imports\ImportMember;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function branches(Request $request)
    {
        Excel::import(new ImportBranch, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function centers(Request $request)
    {
        Excel::import(new ImportCenter, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function members(Request $request)
    {
        Excel::import(new ImportMember, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function index()
    {
        return Inertia::render('Admin/Import/Index');
    }
}
