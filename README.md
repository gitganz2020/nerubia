<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About this Movie API

Database Name : themoviedb

Username: root
Password: none

All controllers are inside API folder

Authorization/Authentication: Sanctum , 

API Codes and Routes are tested in Postman and working.

Issues: I have tried Vue but encountered issues, So I used JQuery to view the contents and if you click it will show each movie by ID. 

For the API routes: 

//Get authorized first before using our Movie API
Route::post('/movies/login',[AuthController::class, 'index']);
Route::post('/movies/register',[AuthController::class, 'store']);
//Group middleware 
Route::group(['middleware' => 'auth:sanctum'], function(){
    //Authenticated APIs
    // Route::resource('movies', MoviesController::class);
    //Route::post('/movies/store',[MoviesController::class, 'store']);
});

Route::resource('movies', MoviesController::class); I made it outside the auth for now due to UI issues







Note: UI or Frontend usage is not finished.


I am using Laravel 8 for this exercise, the Auth is Sanctum for now but Passport on real projects. 


