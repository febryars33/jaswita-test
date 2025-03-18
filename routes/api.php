<?php

use App\Http\Controllers\API\DistrictController;
use App\Http\Controllers\API\ProvinceController;
use App\Http\Controllers\API\RegencyController;
use App\Http\Controllers\API\SubDistrictController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/regencies', [RegencyController::class, 'index'])->name('api.regencies');
Route::get('/districts', [DistrictController::class, 'index'])->name('api.districts');
Route::get('/sub_districts', [SubDistrictController::class, 'index'])->name('api.sub_districts');
