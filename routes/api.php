<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('categories', \App\Http\Controllers\Api\CategoryController::class);

Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class);

Route::get('/products-export', [\App\Http\Controllers\Api\ProductController::class, 'export']);
