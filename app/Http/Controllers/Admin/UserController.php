<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ErrorLogTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    use ErrorLogTrait;

    public function list()
    {
        $users = User::with('roles')->get();
        return Inertia::render('Admin/User/List', compact('users'));
    }

    public function profile()
    {
        $user = Auth::user();
        return Inertia::render('Admin/User/Profile', compact('user'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $permissions = $permissions->groupBy(function ($item) {
            return $item->section;
        });
        $roles = Role::all();
        $user = Auth::user();
        $user_permissions = [];
        return Inertia::render('Admin/User/Add', compact('permissions','user_permissions','roles'));
    }

    public function changePassword(Request $request)
    {

        try {
            $rules = [
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            #Match The Old Password
            if (!Hash::check($request->old_password, auth()->user()->password)) {
                return redirect()->back()->withErrors(['old_password' => 'Old Password Doesn t match']);
            }

            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            \App\Helpers\LogActivity::addToLog('USER PASSWORD' . auth()->user()->name . ' UPDATED');

            return redirect()->route('admin.user.profile');
        } catch (Exception $e) {
            return $this->addToApiErrorLog('api', $e, 'changePassword');
            return redirect()->back()->with(['success' => false]);
        }
    }
    public function changePersonal(Request $request)
    {

        try {
            $rules = [
                'name' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'name' => $request->name
            ]);

            \App\Helpers\LogActivity::addToLog('USER DATA' . auth()->user()->name . ' UPDATED');

            return redirect()->route('admin.user.profile');
        } catch (Exception $e) {
            return $this->addToApiErrorLog('api', $e, 'changePersonal');
            return redirect()->back()->with(['success' => false]);
        }
    }
}
