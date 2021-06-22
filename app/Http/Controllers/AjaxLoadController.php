<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Upazila;
use Illuminate\Http\Request;

class AjaxLoadController extends Controller
{
    public function getDistrict(Request $request)
    {
        $districts = District::select('id', 'name')->where('division_id', $request->get('division_id'))->get();

        if ($districts) {
            return response()->json([
                'status' => 'success',
                'data' => $districts,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'data' => null,
        ]);
    }

    public function getUpazila(Request $request)
    {
        $upazilas = Upazila::select('id', 'name')->where('district_id', $request->get('district_id'))->get();

        if ($upazilas) {
            return response()->json([
                'status' => 'success',
                'data' => $upazilas,
            ]);
        }

        return response()->json([
            'status' => 'error',
            'data' => null,
        ]);
    }
}
