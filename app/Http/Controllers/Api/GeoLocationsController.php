<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use Database\Seeders\UpazilasTableSeeder;
use Illuminate\Http\Request;

class GeoLocationsController extends Controller
{
    public function divisions(Request $request)
    {
        $divisions = Division::orderBy('name', 'ASC')->get();

        if ($divisions->isNotEmpty()) {
            return response()->json([
                'status' => true,
                'divisions' => $divisions
            ]);
        }

        return response()->json([
            'status' => false,
            'divisions' => null
        ]);
    }

    public function districts(Request $request)
    {
        $districts = District::orderBy('name', 'ASC');

        if ($request->input('division_id')) {
            $districts = $districts->where('division_id', $request->input('division_id'));
        }

        $districts = $districts->get();

        if ($districts->isNotEmpty()) {
            return response()->json([
                'status' => true,
                'districts' => $districts
            ]);
        }

        return response()->json([
            'status' => false,
            'districts' => null
        ]);
    }

    public function upazilas(Request $request)
    {
        $upazilas = Upazila::orderBy('name', 'ASC');

        if ($request->input('district_id')) {
            $upazilas = $upazilas->where('district_id', $request->input('district_id'));
        }

        $upazilas = $upazilas->get();

        if ($upazilas->isNotEmpty()) {
            return response()->json([
                'status' => true,
                'upazilas' => $upazilas
            ]);
        }

        return response()->json([
            'status' => false,
            'upazilas' => null
        ]);
    }

}
