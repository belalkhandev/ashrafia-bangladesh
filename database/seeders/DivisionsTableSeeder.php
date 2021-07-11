<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // read json file
        $json = file_get_contents(__DIR__.'/geojson/divisions.json');

        //decode JSON
        $divisions = json_decode($json, true);

        //store division data
        foreach($divisions as $division) {
            $div = new Division();
            $div->name = $division['name'];
            $div->bn_name = $division['bn_name'];
            $div->url = $division['url'];
            $div->save();
        }
    }
}
