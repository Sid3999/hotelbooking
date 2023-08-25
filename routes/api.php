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
//Auth Controller
Route::post('/register', 'Api\AuthController@store');
Route::post('/login', 'Api\AuthController@login');
Route::post('/forgetpassword' , 'Api\AuthController@forgetpassword');
Route::post('/verifyotp' , 'Api\AuthController@verifyotp');
Route::post('/resetpassword' , 'Api\AuthController@resetpassword');
