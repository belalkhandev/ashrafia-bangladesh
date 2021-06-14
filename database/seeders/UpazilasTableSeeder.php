<?php

namespace Database\Seeders;

use App\Models\Upazila;
use Illuminate\Database\Seeder;

class UpazilasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // read json file
        $json = file_get_contents(__DIR__.'/geojson/upazilas.json');

        //decode JSON
        $upazilas = json_decode($json, true);

        //store division data
        foreach($upazilas as $upazila) {
            $upa = new Upazila();
            $upa->district_id = $upazila['district_id'];
            $upa->name = $upazila['name'];
            $upa->bn_name = $upazila['bn_name'];
            $upa->save();
        }
    }
}
