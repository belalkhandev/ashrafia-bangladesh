<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // read json file
        $json = file_get_contents(__DIR__.'/geojson/districts.json');

        //decode JSON
        $districts = json_decode($json, true);

        //store division data
        foreach($districts as $district) {
            $dist = new District();
            $dist->division_id = $district['division_id'];
            $dist->name = $district['name'];
            $dist->bn_name = $district['bn_name'];
            $dist->lat = $district['lat'];
            $dist->lon = $district['lon'];
            $dist->save();
        }
    }
}
