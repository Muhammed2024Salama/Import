<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\DeveloperImportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::apiResource('/developers',DeveloperController::class);
Route::post('/developers/import', [DeveloperImportController::class, 'import']);
