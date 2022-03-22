<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BodyTypeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Http\Controllers\WebhookController;
use Puppyter\Tracker\TrackerController;

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

Route::get('/',[IndexController::class,'index'])->name('welcome');


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
Route::get('/offers/get/all', [OfferController::class,'getAll'])
->name('offersAll');
Route::get('/cars/compare',[OfferController::class, 'compare'])
    ->name('show.compare');
Route::get('/offer/{offer}/destroy',[OfferController::class,'destroy'])
    ->name('offer.destroy');
/**  */


/** Search Routes */
Route::post('/car/search/manufacture', [SearchController::class,'searchManufacture'])
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
Route::post('/car/search/fuel', [SearchController::class,'searchFuel'])
    ->middleware('web')
    ->name('fuelSearch');
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
//Route::get('/car/get/manufacture', [ManufactureController::class,'get'])
//    ->name('getManufacture');
Route::get('/car/all/manufacture', [ManufactureController::class,'getAll'])
    ->name('allManufacture');
/**  */


/** Model Routes */
//Route::get('/car/get/model', [ModelController::class,'get'])
//    ->name('getModel');
Route::get('/car/all/model', [ModelController::class,'getAll'])
    ->name('allModel');
/**  */


/** Fuel Routes */
//Route::get('/car/get/fuel', [FuelController::class,'get'])
//    ->name('getFuel');
Route::get('/car/all/fuel', [FuelController::class,'getAll'])
    ->name('allFuel');
/**  */


/** Motor Routes */
//Route::get('/car/get/motor', [MotorController::class,'get'])
//    ->name('getMotor');
Route::get('/car/all/motor', [MotorController::class,'getAll'])
    ->name('allMotor');
/**  */


/** Body Type Routes */
//Route::get('/car/get/bt', [BodyTypeController::class,'get'])
//    ->name('getBodyType');
Route::get('/car/all/bt', [BodyTypeController::class,'getAll'])
    ->name('allBodyType');
/**  */

/** Admin Routes */
Route::prefix('admin')->group(function (){
    Route::post('/user/invoices', [AdminController::class,'takeUserInvoice'])
        ->name('takeInvoicesShow');
    Route::get('/user/invoices/show', [AdminController::class,'takeUserInvoicesShow'])
        ->name('takeInvoices');
    Route::get('/', [AdminController::class,'index']);
    Route::post('/car/create/bt', [BodyTypeController::class,'create'])
        ->name('createBodyType');
    Route::get('/car/show/create/bt', [BodyTypeController::class,'show'])
        ->name('createBodyTypeShow');
    Route::post('/car/create/motor', [MotorController::class,'create'])
        ->name('createMotor');
    Route::get('/car/show/create/motor', [MotorController::class,'show'])
        ->name('createMotorShow');
    Route::post('/car/create/fuel', [FuelController::class,'create'])
        ->name('createFuel');
    Route::get('/car/show/create/fuel', [FuelController::class,'show'])
        ->name('createFuelShow');
    Route::post('/car/create/model', [ModelController::class,'create'])
        ->name('createModel');
    Route::get('/car/show/create/model', [ModelController::class,'show'])
        ->name('createModelShow');
    Route::post('/car/create/manufacture', [ManufactureController::class,'create'])
        ->name('createManufacture');
    Route::get('/car/show/create/manufacture', [ManufactureController::class,'show'])
        ->name('createManufactureShow') ;
});

/** Cash Routes */
Route::get('/payment/show', [CashController::class, 'show'])
    ->middleware('web')
    ->name('upToTop');
Route::get('/offer/up/show', [CashController::class, 'show'])
    ->middleware('web')
    ->name('upToTop');
Route::get('/setup-intent',[CashController::class, 'createIntent'])
    ->middleware('web');
Route::post('/accept/payment/show',[CashController::class,'acceptPayment'])
    ->middleware('web');
Route::post('/accept/payment/subscription', [CashController::class,'subscription'])
    ->middleware('web');
Route::post('/accept/payment/one_time', [CashController::class,'oneTimePayment'])
    ->middleware('web');
    Route::post('/stripe/webhook',[CashController::class,'handleWebhook']);

