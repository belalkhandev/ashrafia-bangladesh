<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sadmin = Role::where('name', 'super_admin')->first();
        $admin = Role::where('name', 'admin')->first();
        $follower = Role::where('name', 'follower')->first();

        $user = new User();
        $user->name = "Super admin";
        $user->username = "superadmin";
        $user->password = app('hash')->make('123456');
        $user->otp = rand(111111, 999999);
        $user->is_verified = true;
        $user->save();
        $user->attachRole($sadmin);

        $user = new User();
        $user->name = "Admin";
        $user->username = "admin";
        $user->password = app('hash')->make('123456');
        $user->otp = rand(111111, 999999);
        $user->is_verified = true;
        $user->save();
        $user->attachRole($sadmin);

        $user = new User();
        $user->name = "Follower";
        $user->username = "follwer";
        $user->password = app('hash')->make('123456');
        $user->otp = rand(111111, 999999);
        $user->is_verified = true;
        $user->save();
        $user->attachRole($follower);

    }
}
