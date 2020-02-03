<?php

use Illuminate\Http\Request;

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

Route::group([
    'namespace'  => 'Api',
    'middleware' => 'auth:api'
], function () { // custom admin routes
    Route::get('events', 'EventApiController@index');
    Route::get('events/{id}', 'EventApiController@single');
    Route::get('events/{id}/score', 'EventApiController@score');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
