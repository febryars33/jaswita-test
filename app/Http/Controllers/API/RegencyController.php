<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Snairbef\Regional\Models\Regency;

class RegencyController extends Controller
{
    public function index(Request $request)
    {
        $province_id = $request->integer('province_id');
        $regencies = Regency::where('province_id', $province_id)->get();
        return response()->json($regencies);
    }
}
