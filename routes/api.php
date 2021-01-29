<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MoviesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\API\AuthController;

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

//Get authorized first before using our Movie API
Route::post('/movies/login',[AuthController::class, 'index']);
Route::post('/movies/register',[AuthController::class, 'store']);
//Group middleware 
Route::group(['middleware' => 'auth:sanctum'], function(){
    //Authenticated APIs
    // Route::resource('movies', MoviesController::class);
    //Route::post('/movies/store',[MoviesController::class, 'store']);
});

Route::resource('movies', MoviesController::class);
//Route::get('/movies', [MoviesController::class, 'index']);


