<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuotationRequirement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index2()
    {
        return Inertia::render('User/Quotation/Index');
    }

    public function index()
    {
        $quotations = QuotationRequirement::with('customer');
        $pending_quotations = $quotations->where('status', 0)->take(10)->orderBy('id','desc')->get();

        $pending_quotations_count = $quotations->where('status', 0)->count();
        $quotations = $quotations->get();
        $quotations_count = $quotations->count();
        return Inertia::render('Admin/Dashboard', compact('pending_quotations_count', 'pending_quotations', 'quotations_count', 'quotations'));
    }
}
