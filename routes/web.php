<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Plant;

/*
 * Model bindings
 */

Route::bind('user', function($value) {
    return User::where('username', $value)->first();
});

Route::bind('plant', function($value) {
    return Plant::find($value);
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('{user?}', 'UserController@index')->name('index');
});

Route::prefix('plant')->name('plant.')->middleware('auth')->group(function() {
    Route::get('list', 'PlantController@list')->name('list');
    Route::get('show/{plant}', 'PlantController@show')->name('show');
    Route::get('edit/{plant}', 'PlantController@edit')->name('edit');
    Route::post('edit/{plant}', 'PlantController@store')->name('store');
    Route::get('add', 'PlantController@add')->name('add');
    Route::post('add', 'PlantController@create')->name('create');
    Route::get('delete', 'PlantController@delete')->name('delete');
});

Route::prefix('seed')->name('seed.')->group(function() {
    Route::get('{seed}', 'SeedController@index')->name('index');
    //Authenticated routes
    Route::middleware('auth')->group(function() {
        Route::get('{seed}/edit', 'SeedController@edit')->name('edit');
        Route::post('{seed}/edit', 'SeedController@store')->name('store');
        Route::post('{plant}/create', 'SeedController@create')->name('create');
    });
});

Route::prefix('json')->name('json.')->group(function() {
    Route::get('families','JsonController@families')->name('families');
    Route::get('genera', 'JsonController@genera')->name('genera');
});
