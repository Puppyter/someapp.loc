<?php

use App\Http\Controllers\BodyTypeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\MotorController;
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
Route::post('/users/create/store', [UserController::class,'store'])
    ->middleware('web')
    ->name('usersStore');


Route::post('/login', [LoginController::class,'login'])
    ->middleware('web')
    ->name('login');
Route::get('/logout', [LoginController::class,'logout'])
    ->middleware('web')
    ->name('logout');

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

Route::post('/car/create/manufacture', [ManufactureController::class,'create'])
    ->name('createManufacture');
Route::get('/car/get/manufacture', [ManufactureController::class,'get'])
    ->name('getManufacture');
Route::get('/car/all/manufacture', [ManufactureController::class,'getAll'])
    ->name('allManufacture');

Route::post('/car/create/model', [ModelController::class,'create'])
    ->name('createModel');
Route::get('/car/get/model', [ModelController::class,'get'])
    ->name('getModel');
Route::get('/car/all/manufacture', [ModelController::class,'getAll'])
    ->name('allModel');

Route::post('/car/create/fuel', [FuelController::class,'create'])
    ->name('createFuel');
Route::get('/car/get/fuel', [FuelController::class,'get'])
    ->name('getFuel');
Route::get('/car/all/fuel', [FuelController::class,'getAll'])
    ->name('allFuel');

Route::post('/car/create/motor', [MotorController::class,'create'])
    ->name('createMotor');
Route::get('/car/get/motor', [MotorController::class,'get'])
    ->name('getMotor');
Route::get('/car/all/motor', [MotorController::class,'getAll'])
    ->name('allMotor');

Route::post('/car/create/bt', [BodyTypeController::class,'create'])
    ->name('createBodyType');
Route::get('/car/get/bt', [BodyTypeController::class,'get'])
    ->name('getBodyType');
Route::get('/car/all/bt', [BodyTypeController::class,'getAll'])
    ->name('allBodyType');

