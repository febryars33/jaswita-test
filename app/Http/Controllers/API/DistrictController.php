<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Snairbef\Regional\Models\District;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $regency_id = $request->integer('regency_id');
        $districts = District::where('regency_id', $regency_id)->get();
        return response()->json($districts);
    }
}
