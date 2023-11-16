<?php

namespace Database\Seeders;

use App\Enums\Variables;
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
        /*
        **ADD PERMISSIONS TO SUPEr ADMIN ROLE
        */
        $permissions = [
            'admin' => [
                ['name' => 'admin.dashboard', 'section' => 'admin'],

            ],
            'user' => [
                ['name' => 'user.create', 'section' => 'user'],
                ['name' => 'user.list', 'section' => 'user'],
                ['name' => 'user.update', 'section' => 'user'],
                ['name' => 'user.delete', 'section' => 'user'],
                ['name' => 'user.block', 'section' => 'user'],
                ['name' => 'user.my', 'section' => 'user'],
            ],
            'role' => [
                ['name' => 'role.list', 'section' => 'role'],
                ['name' => 'role.edit', 'section' => 'role'],
                ['name' => 'role.create', 'section' => 'role'],
                ['name' => 'role.delete', 'section' => 'role'],
                ['name' => 'role.store', 'section' => 'role'],
                ['name' => 'role.update', 'section' => 'role'],
            ],
            'seller' => [
                ['name' => 'seller.create', 'section' => 'seller'],
                ['name' => 'seller.list', 'section' => 'seller'],
                ['name' => 'seller.store', 'section' => 'seller'],
                ['name' => 'seller.approve', 'section' => 'seller'],
            ],
            'board' => [
                ['name' => 'board.list', 'section' => 'board'],
                ['name' => 'board.create', 'section' => 'board'],
                ['name' => 'board.store', 'section' => 'board'],
            ],
            'subscription' => [
                ['name' => 'subscription.list', 'section' => 'subscription'],
                ['name' => 'subscription.approve', 'section' => 'subscription'],
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
        $role = Role::where('name', 'SUPER ADMIN')->first();
        if (!$role) {
            $role = Role::create(['name' => 'SUPER ADMIN']);
        }
        $role->syncPermissions($allPermissions);

        $role = Role::where('name', Variables::GUEST_ROLE_NAME)->first();
        if (!$role) {
            $role = Role::create(['name' => Variables::GUEST_ROLE_NAME]);
        }

        /*
        **ADD PERMISSIONS TO GUEST ROLE
        */
        $role->syncPermissions([
            'admin.dashboard',
            'user.update',
            'user.my'
        ]);


        $admin_user['name'] = 'SUPER ADMIN';
        $admin_user['email'] = 'suadmin@gmail.com';
        $admin_user['password'] = Hash::make('Abcd@1234');

        $user = User::where('email',  $admin_user['email'])->first();
        if (!$user) {
            $user = User::create($admin_user);
        }

        $user->assignRole('SUPER ADMIN');
    }
}
