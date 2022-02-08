<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('automovil', [HomeController::class, 'index']);
Route::post('automovil/store', [HomeController::class, 'store']);
Route::post('automovil/show/{id}', [HomeController::class, 'show']);
Route::post('automovil/update/{id}', [HomeController::class, 'update']);
Route::post('automovil/eliminar/{id}', [HomeController::class, 'destroy']);
// Route::resource('automovil', [HomeController::class])->only(['index', 'store', 'update', 'destroy']);
