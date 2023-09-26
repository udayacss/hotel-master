<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BatteryType;
use App\Models\Customer;
use App\Models\InverterType;
use App\Models\PanelType;
use App\Models\PaseType;
use App\Models\ProjectType;
use App\Models\QuotationRequirement;
use App\Models\SystemBrand;
use App\Models\SystemType;
use App\Models\UnitRange;
use App\Services\QuotationService;
use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = (new QuotationService())->getPaginated();
        return Inertia::render('Admin/Quotation/List', compact('quotations'));
    }

    public function create()
    {
        $project_types = ProjectType::all();
        $unite_ranges = UnitRange::all();
        $phase_types = PaseType::all();
        $system_types = SystemType::with('brands')->get();
        $panel_types = PanelType::all();
        $inverter_types = InverterType::all();
        $battery_types = BatteryType::all();
        $system_brands = SystemBrand::all();
        // dd($unite_ranges);
        return Inertia::render('Admin/Quotation/Create', compact(
            'project_types',
            'unite_ranges',
            'phase_types',
            'system_types',
            'panel_types',
            'inverter_types',
            'system_brands',
            'battery_types'
        ));
    }

    public function store(Request $request)
    {
        $rules = [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'sometimes|email',
            'inverter_type' => 'required',
            'panel_type' => 'required',
            'phase_type' => 'required',
            'system_type' => 'required',
            'unit_count' => 'required',
            'project_type' => 'required',
            // 'system_brand' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' =>$validator->errors()], 200);
            // return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // dd($request->all());
            DB::beginTransaction();
            $customer = new Customer();
            $customer->first_name = $request->fname;
            $customer->last_name = $request->lname;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->contact = $request->contact;
            $customer->created_by = Auth::user()->id;

            $customer->save();

            $quotation  = new QuotationRequirement();
            $quotation->customer_id  = $customer->id;
            $quotation->units  = $request->unit_count;
            $quotation->project_type  =   $request->project_type;
            $quotation->phase_type  =   $request->phase_type;
            $quotation->system_type  =   $request->system_type;
            $quotation->panel_origin_type  =   $request->panel_type;
            $quotation->inverter_type  =   $request->inverter_type;
            // $quotation->system_brand  =   $request->system_brand;
            $quotation->battery_type  =   $request->battery_type;
            $quotation->requested_capacity  =   $request->requested_capacity;
            $quotation->status  =  0;
            $quotation->save();

            DB::commit();
            \App\Helpers\LogActivity::addToLog('QUOTATION ' . $customer->id . ' REQUESTED');
            return response()->json(['success' => true, 'id' => $quotation->id], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['success' => true]);
        }
    }
}
