<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamosController;
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
Route::group(
    ['prefix' => 'v1'],
    function () {
        Route::apiResource('autors', AutorController::class);
        Route::apiResource('clients', ClienteController::class);
        Route::apiResource('books', LibroController::class);
        Route::apiResource('loans', PrestamosController::class);
        Route::get('overdueLoans', [PrestamosController::class, 'overdueLoans']);
        Route::get('weeklyReport', [PrestamosController::class, 'weeklyReport']);
        Route::get('monthlyReport', [PrestamosController::class, 'monthlyReport']);
    }
);
