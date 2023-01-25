<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransferController;
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

Route::group(['prefix' => 'auth'], function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/update-token', [AuthController::class, 'updateToken']);
});
Route::group(['middleware' => 'jwt.verify'], function() {
    Route::post('/transfer', [TransferController::class, 'create']);
});