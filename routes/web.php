<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Middleware\Roles\AdminMiddleware;
use App\Http\Middleware\Roles\ManagerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register'  =>  false
]);

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('/branches', BranchController::class)
        ->middleware(AdminMiddleware::class);
    Route::resource('/inventories', InventoryController::class);
    Route::post('/inventories/{id}/mutation', [InventoryController::class, 'mutation'])->name('inventories.mutation');
    Route::resource('/categories', CategoryController::class);
});

