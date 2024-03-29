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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// cat artisan | curl -F 'paste=<-' localhost/api/
Route::post('/', 'App\Http\Controllers\Api\AddPasteController@index');
Route::get('/{id}/{raw?}', 'App\Http\Controllers\Api\GetPasteController@index')->whereNumber('id');
