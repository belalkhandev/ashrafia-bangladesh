<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        //run roles table seeder
        $this->call(RolesTableSeeder::class);

        //run users table seeder
        $this->call(UsersTableSeeder::class);
    }
}
