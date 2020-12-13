<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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

/*
|--------------------------------------------------------------------------
| To-do's
|--------------------------------------------------------------------------
|
| - Fix Toggle on Cars.index or Cars.show
| - Fix deeper validation. If user has more than 1 car, enable toggle
| - On Cars.index only show cars from logged in user
| - Make category filter on Cars.index and filter
| - Fix new Maintenance Item on Cars.show. -> Hidden input in form on car_item_id
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('contact', [ContactController::class, 'show'])->name('contact');
Route::get('about', [AboutController::class, 'show'])->name('about');
Route::get('cars', [CarsController::class, 'index'])->name('cars.index')->middleware('auth');
Route::get('cars/create/', [CarsController::class, 'create'])->name('cars.create')->middleware('auth');
Route::post('cars/store', [CarsController::class, 'store'])->name('cars.store')->middleware('auth');
Route::get('cars/{id}', [CarsController::class, 'show'])->name('cars.show')->middleware('auth');

Route::post('maintenance/store', [MaintenanceController::class, 'store'])->name('maintenance.store')->middleware('auth');

Route::post('changeStatus', [CarsController::class, 'changeStatus'])->name('cars.changeStatus');

Route::get('admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
