<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BatteryType;
use App\Models\InverterType;
use App\Models\PanelType;
use App\Models\PaseType;
use App\Models\PriceList;
use App\Models\ProjectType;
use App\Models\SystemBrand;
use App\Models\SystemType;
use App\Models\UnitRange;
use Inertia\Inertia;
use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PriceListController extends Controller
{

    public function index()
    {
        return Inertia::render('Admin/PriceList/List');
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
        return Inertia::render('Admin/PriceList/Create', compact(
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
            'inverter_type' => 'required',
            'panel_type' => 'required',
            'phase_type' => 'required',
            'system_type' => 'required',
            'unit_count' => 'required',
            // 'system_brand' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            DB::beginTransaction();


            $price_list  = new PriceList();
            $price_list->max_units  = $request->unit_count;
            $price_list->phase_type_id  =   $request->phase_type;
            $price_list->grid_type_id  =   $request->system_type;
            $price_list->panel_type_id  =   $request->panel_type;
            $price_list->inverter_type_id  =   $request->inverter_type;
            $price_list->capacity  =   $request->capacity;
            $price_list->average_bill  =   $request->avetage_bill;
            $price_list->price  =   $request->price;
            $price_list->save();

            DB::commit();

            return redirect()->back();
            return redirect()->route('admin.price_list.index');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['success' => true]);
        }
    }
}
