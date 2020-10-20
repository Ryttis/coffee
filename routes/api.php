<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PricesController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('prices', [PricesController::class,'index']);
Route::get('prices/{price}', [PricesController::class,'show']);
Route::post('prices', [PricesController::class,'store']);
// Route::put('prices', [PricesController::class,'store']);
Route::delete('prices/{price}', [PricesController::class,'destroy']);

