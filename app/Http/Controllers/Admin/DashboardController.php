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
       
        return Inertia::render('Admin/Dashboard');
    }
    public function guest()
    {
       
        return Inertia::render('Seller/Subscription/Guest');
    }
}
