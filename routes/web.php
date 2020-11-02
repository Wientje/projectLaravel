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

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', [ContactController::class, 'show'])->name('contact');
Route::get('about', [AboutController::class, 'show'])->name('about');
Route::get('cars', [CarsController::class, 'index'])->name('cars.index')->middleware('auth');
Route::get('cars/create/', [CarsController::class, 'create'])->name('cars.create')->middleware('auth');
Route::post('cars/store', [CarsController::class, 'store'])->name('cars.store');
Route::get('cars/{id}', [CarsController::class, 'show'])->name('cars.show');

Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
