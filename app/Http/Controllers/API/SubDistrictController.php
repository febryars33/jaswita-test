<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Snairbef\Regional\Models\SubDistrict;

class SubDistrictController extends Controller
{
    public function index(Request $request)
    {
        $district_id = $request->integer('district_id');
        $sub_districts = SubDistrict::where('district_id', $district_id)->get();
        return response()->json($sub_districts);
    }
}
