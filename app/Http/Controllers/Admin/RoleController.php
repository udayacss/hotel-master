<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function list()
    {
        $roles = Role::with('permissions')->get();
        return Inertia::render('Admin/Role/List', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $permissions = $permissions->groupBy(function ($item) {
            return $item->section;
        });

        $user = Auth::user();
        $user_permissions = [];
        return Inertia::render('Admin/Role/Add', compact('permissions'));
    }

    public function store(Request $request)
    {
        $rules = [
            'role_name' => 'required',
        ];

        $request->validate($rules);

        if (isset($request->role_id)) {
            $role = Role::findById($request->role_id);
            $role->name = $request->role_name;
            $role->save();
        } else {
            $role = Role::create(['name' => $request->role_name]);
        }
        $role->syncPermissions($request->selected_permissions);
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->where('id', $id)->first();
        $permissions = Permission::all();
        $permissions = $permissions->groupBy(function ($item) {
            return $item->section;
        });

        $user = Auth::user();
        $user_permissions = [];
        return Inertia::render('Admin/Role/Add', compact('permissions', 'role'));
    }
}
