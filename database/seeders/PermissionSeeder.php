<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Guard;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed PermissionSeeder
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user' => [
                ['name' => 'user.create', 'section' => 'user'],
                ['name' => 'user.list', 'section' => 'user'],
                ['name' => 'user.update', 'section' => 'user'],
                ['name' => 'user.delete', 'section' => 'user'],
                ['name' => 'user.block', 'section' => 'user'],
            ],
            'role' => [
                ['name' => 'role.create', 'section' => 'role'],
                ['name' => 'role.list', 'section' => 'role'],
                ['name' => 'role.update', 'section' => 'role'],
                ['name' => 'role.delete', 'section' => 'role'],
                ['name' => 'role.block', 'section' => 'role'],
            ],
        ];

        $data = [];
        foreach ($permissions as $permission) {
            foreach ($permission as $p) {
                // dd($permission[0]['name']);
                $row = [
                    'name' => $p['name'],
                    'section' => $p['section'],
                    'guard_name' => Guard::getDefaultName(static::class),
                ];
                if (!Permission::where('name', $p['name'])->first()) {
                    array_push($data, $row);
                }
            }
        }
        // Permission::truncate();
        Permission::insert($data);

        $allPermissions = Permission::all();
        $role = Role::where('name', 'SuperUser')->first();
        if (!$role) {
            $role = Role::create(['name' => 'SuperUser']);
        }
        $role->syncPermissions($allPermissions);


        $admin_user['name'] = 'Super Admin';
        $admin_user['email'] = 'suadmin@gmail.com';
        $admin_user['password'] = Hash::make('Abcd@1234');

        $user = User::where('email',  $admin_user['email'])->first();
        if (!$user) {
            $user = User::create($admin_user);
        }

        $user->assignRole('SuperUser');
    }
}
