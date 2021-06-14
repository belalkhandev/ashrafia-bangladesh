<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //run roles table seeder
        $this->call(RolesTableSeeder::class);

        //run users table seeder
        $this->call(UsersTableSeeder::class);

        // //run divisions
        $this->call(DivisionsTableSeeder::class);

        // //run districts
        $this->call(DistrictsTableSeeder::class);

        // //run upazilas
        $this->call(UpazilasTableSeeder::class);
    }
}
