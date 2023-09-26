<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GemCategory;
use App\Services\GemCategoryService;
use App\Services\ImageService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class GemCategoryController extends Controller
{
    public function list()
    {

        $categories = (new GemCategoryService())->getPaginated();
        return Inertia::render('Admin/GemCategory/List', compact('categories'));
    }

    public function create()
    {
        return Inertia::render('Admin/GemCategory/CreateNEdit');
    }

    public function store(Request $request)
    {

        try {
            $rules = [
                'name' => 'required|string',
                'image' => 'required|string',
                'icon' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $gemCat = new GemCategory();
            $gemCat->name = $request->name;
            $gemCat->image = $request->image;
            $gemCat->icon = $request->icon;

            $gemCat->save();

            \App\Helpers\LogActivity::addToLog('GEM CAT ' . $request->name . ' CREATED');

            return redirect()->route('admin.gem_cat.create');
        } catch (Exception $e) {
            return redirect()->back()->with(['success' => true]);
        }
        return response()->json(['sucess' => 'sssss']);
        return Inertia::render('Admin/Branch/create');
    }

    public function edit($id)
    {
        $gem_category = GemCategory::where('id', $id)->first();

        return Inertia::render('Admin/GemCategory/CreateNEdit', compact('gem_category'));
    }

    public function update(Request $request)
    {

        try {
            $rules = [
                'name' => 'required|string',
                'image' => 'required|string',
                'icon' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $gemCat = GemCategory::where('id', $request->id)->first();
            $gemCat->name = $request->name;
            $gemCat->image = $request->image;
            $gemCat->icon = $request->icon;

            $gemCat->save();
            \App\Helpers\LogActivity::addToLog('GEM CAT ' . $request->name . ' EDITED');
            return redirect()->back()->with(['success' => true]);
        } catch (Exception $e) {
            return redirect()->back()->with(['success' => true]);
        }
    }

    public function delete($id)
    {
        try {
            
            $cat = GemCategory::where('id', $id)
                ->first();
            
            (new ImageService())->delete($cat->image);
            (new ImageService())->delete($cat->icon);

            $cat->delete();

            \App\Helpers\LogActivity::addToLog('GEM CAT  ' . $id . ' DELETED');
            return response()->json(['status' => 'success', 'data' => (new GemCategoryService())->getPaginated()], 200);
        } catch (Exception $e) {
            return redirect()->back()->with(['success' => true]);
        }
    }
}
