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

/** User Routes */
Route::resource('users',UserController::class)
    ->middleware('web');
Route::post('/users/create/store', [UserController::class,'store'])
    ->middleware('web')
    ->name('usersStore');
/**  */



/** Login Routes */
Route::post('/login', [LoginController::class,'login'])
    ->middleware('web')
    ->name('login');
Route::get('/logout', [LoginController::class,'logout'])
    ->middleware('web')
    ->name('logout');
/**  */


/** Offers Routes */
Route::post('/offers/store',[OfferController::class,'store'])
    ->middleware('web')
    ->name('offerStore');
Route::resource('offers',OfferController::class)
    ->middleware('web');
/**  */


/** Search Routes */
Route::post('/car/search/manufacture', [SearchController::class,'searchCar'])
    ->middleware('web')
    ->name('manufactureSearch');
Route::post('/car/search/model', [SearchController::class,'searchModel'])
    ->middleware('web')
    ->name('modelSearch');
Route::post('/car/search/motor', [SearchController::class,'searchMotor'])
    ->middleware('web')
    ->name('motorSearch');
Route::post('/car/search/offer', [SearchController::class,'searchOffer'])
    ->middleware('web')
    ->name('offerSearch');
Route::post('/car/search/bt', [SearchController::class,'searchBodyType'])
    ->middleware('web')
    ->name('bodyTypeSearch');
/**  */


/** Car Routes */
Route::get('/car/create',[CarController::class,'create'])
    ->middleware('web')
    ->name('newCar');
Route::post('/car/store',[CarController::class,'store'])
    ->middleware('web')
    ->name('storeCar');
/**  */


/** Manufacture Routes */
Route::post('/car/create/manufacture', [ManufactureController::class,'create'])
    ->name('createManufacture');
Route::get('/car/show/create/manufacture', [ManufactureController::class,'show'])
    ->name('createManufactureShow');
Route::get('/car/get/manufacture', [ManufactureController::class,'get'])
    ->name('getManufacture');
Route::get('/car/all/manufacture', [ManufactureController::class,'getAll'])
    ->name('allManufacture');
/**  */


/** Model Routes */
Route::post('/car/create/model', [ModelController::class,'create'])
    ->name('createModel');
Route::get('/car/show/create/model', [ModelController::class,'show'])
    ->name('createModelShow');
Route::get('/car/get/model', [ModelController::class,'get'])
    ->name('getModel');
Route::get('/car/all/model', [ModelController::class,'getAll'])
    ->name('allModel');
/**  */


/** Fuel Routes */
Route::post('/car/create/fuel', [FuelController::class,'create'])
    ->name('createFuel');
Route::get('/car/show/create/fuel', [FuelController::class,'show'])
    ->name('createFuelShow');
Route::get('/car/get/fuel', [FuelController::class,'get'])
    ->name('getFuel');
Route::get('/car/all/fuel', [FuelController::class,'getAll'])
    ->name('allFuel');
/**  */


/** Motor Routes */
Route::post('/car/create/motor', [MotorController::class,'create'])
    ->name('createMotor');
Route::get('/car/show/create/motor', [MotorController::class,'show'])
    ->name('createMotorShow');
Route::get('/car/get/motor', [MotorController::class,'get'])
    ->name('getMotor');
Route::get('/car/all/motor', [MotorController::class,'getAll'])
    ->name('allMotor');
/**  */


/** Body Type Routes */
Route::post('/car/create/bt', [BodyTypeController::class,'create'])
    ->name('createBodyType');
Route::get('/car/show/create/bt', [BodyTypeController::class,'show'])
    ->name('createBodyTypeShow');
Route::get('/car/get/bt', [BodyTypeController::class,'get'])
    ->name('getBodyType');
Route::get('/car/all/bt', [BodyTypeController::class,'getAll'])
    ->name('allBodyType');
/**  */
