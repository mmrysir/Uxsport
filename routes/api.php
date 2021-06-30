<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\AuthController;

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
// public routes for index

Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');

Route::get('/tounarment','App\Http\Controllers\TournamentController@index');
Route::get('/coach','App\Http\Controllers\CoachController@index');
Route::get('/event','App\Http\Controllers\EventController@index');
Route::get('/club','App\Http\Controllers\ClubController@index');
Route::get('/player','App\Http\Controllers\PlayerController@index');

Route::get('/tounarment/{id}','App\Http\Controllers\TournamentController@show');
Route::get('/coach/{id}','App\Http\Controllers\CoachController@show');
Route::get('/event/{id}','App\Http\Controllers\EventController@show');
Route::get('/club/{id}','App\Http\Controllers\ClubController@show');
Route::get('/player/{id}','App\Http\Controllers\PlayerController@show');


//protected routes
Route:: group(['middleware'=>['auth:sanctum']], function () {

    Route::post('/logout', 'App\Http\Controllers\AuthController@logout');
    //protected routes for search

    Route::get('/club/search/{name}','App\Http\Controllers\ClubController@search');
    Route::get('/player/search/{name}','App\Http\Controllers\PlayerController@search');
    Route::get('/coach/search/{name}','App\Http\Controllers\CoachController@search');
    Route::get('/event/search/{name}','App\Http\Controllers\EventController@search');
    Route::get('/tounarment/search/{name}','App\Http\Controllers\TournamentController@search');

    //protected routes for store

    Route::post('/coach','App\Http\Controllers\CoachController@store');
    Route::post('/club','App\Http\Controllers\ClubController@store');
    Route::post('/player','App\Http\Controllers\PlayerController@store');
    Route::post('/tounarment','App\Http\Controllers\TournamentController@store');
    Route::post('/event','App\Http\Controllers\EventController@store');


    //protected routes for delete

    Route::delete('/tounarment/{id}','App\Http\Controllers\TournamentController@destroy');
    Route::delete('/coach/{id}','App\Http\Controllers\CoachController@destroy');
    Route::delete('/event/{id}','App\Http\Controllers\EventController@destroy');
    Route::delete('/club/{id}','App\Http\Controllers\ClubController@destroy');
    Route::delete('/player/{id}','App\Http\Controllers\PlayerController@destroy');

    //protected routes update
    Route::put('/tounarment/{id}','App\Http\Controllers\TournamentController@update');
    Route::put('/event/{id}','App\Http\Controllers\EventController@update');
    Route::put('/club/{id}','App\Http\Controllers\ClubController@update');
    Route::put('/coach/{id}','App\Http\Controllers\CoachController@update');
    Route::put('/player/{id}','App\Http\Controllers\PlayerController@update');
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
