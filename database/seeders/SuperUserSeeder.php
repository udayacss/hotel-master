<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_user['name'] = 'Super Admin';
        $admin_user['email'] = 'suadmin@gmail.com';
        $admin_user['password'] = Hash::make('Abcd@1234');




        $user = User::where('email',  $admin_user['email'])->first();
        if (!$user) {
            $user = User::create($admin_user);
        }
    }
}
