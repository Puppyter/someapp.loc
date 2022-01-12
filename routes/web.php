<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[IndexController::class,'index']);
Route::resource('offers',OfferController::class)
    ->middleware('web');
Route::resource('users',UserController::class)
    ->middleware('web');
Route::post('/login', [LoginController::class,'login'])
    ->middleware('web')
    ->name('login');
Route::get('/logout', [LoginController::class,'logout'])
    ->middleware('web')
    ->name('logout');
Route::post('/users/create/store', [UserController::class,'store'])
    ->middleware('web')
    ->name('usersStore');
Route::get('/car/create',[CarController::class,'create'])
    ->middleware('web')
    ->name('newCar');
Route::post('/car/store',[CarController::class,'store'])
    ->middleware('web')
    ->name('storeCar');
Route::post('/offers/store',[OfferController::class,'store'])
    ->middleware('web')
    ->name('offerStore');
Route::post('/car/search/manufacture', [SearchController::class,'searchCar'])
    ->middleware('web')
    ->name('manufactureSearch');
Route::post('/car/search/model', [SearchController::class,'searchCar'])
    ->middleware('web')
    ->name('modelSearch');
