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
                ['name' => 'user.create', 'group' => 'user'],
                ['name' => 'user.list', 'group' => 'user'],
                ['name' => 'user.update', 'group' => 'user'],
                ['name' => 'user.delete', 'group' => 'user'],
                ['name' => 'user.block', 'group' => 'user'],
            ],
            'role' => [
                ['name' => 'role.create', 'group' => 'role'],
                ['name' => 'role.list', 'group' => 'role'],
                ['name' => 'role.update', 'group' => 'role'],
                ['name' => 'role.delete', 'group' => 'role'],
                ['name' => 'role.block', 'group' => 'role'],
            ],
        ];

        $data = [];
        foreach ($permissions as $permission) {
            foreach ($permission as $p) {
                // dd($permission[0]['name']);
                $row = [
                    'name' => $p['name'],
                    'group' => $p['group'],
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
