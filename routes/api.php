<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\PropertiesController;
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


// Public routes 
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/brokers', [BrokerController::class, 'index'])->name('brokers.index');
Route::get('/brokers/{broker}', [BrokerController::class, 'show'])->name('brokers.show');
Route::get('/properties', [PropertiesController::class, 'index'])->name('properties.index');
Route::get('/properties/{property}', [PropertiesController::class, 'show'])->name('properties.show');

// Protected routes 

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('/brokers', BrokerController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('/properties', PropertiesController::class)->only(['store', 'update', 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
