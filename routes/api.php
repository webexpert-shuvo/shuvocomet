<?php

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

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    //Basic Api

    Route::get('customers' , [App\Http\Controllers\APIController::class , 'customers']);
    Route::get('customers/{id}' , [App\Http\Controllers\APIController::class , 'singlecustomer']);

    Route::get('tags' , [App\Http\Controllers\TagApiController::class, 'TagApi']);
    Route::get('tags/{id}' , [App\Http\Controllers\TagApiController::class, 'SingleTag']);

