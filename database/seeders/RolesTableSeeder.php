<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /// Super Admin Role
        $superAdmin = new Role();
        $superAdmin->name = 'super_admin';
        $superAdmin->display_name = 'Super Admin';
        $superAdmin->description = '';
        $superAdmin->save();;

        // Admin Role
        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Admin';
        $admin->description = '';
        $admin->save();

        // Disciple/murid Role
        $employee = new Role();
        $employee->name = 'disciple';
        $employee->display_name = 'Disciple';
        $employee->description = '';
        $employee->save();
    }
}
