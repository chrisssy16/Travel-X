<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_toursite_view',[AdminController::class,'addview']);
Route::post('/upload_toursite',[AdminController::class,'upload']);
Route::get('/add_tourpack_view', [AdminController::class, 'addTourpackView']);


Route::post('/upload_tourpacks', [AdminController::class, 'uploadTourpacks'])->name('upload_tourpacks');
Route::post('/booknow', [HomeController::class, 'booknow']);


Route::get('/reservation', [HomeController::class, 'reservation']);
Route::delete('cancel_reservation/{id}', [HomeController::class, 'cancel_reservation'])->name('cancel_reservation');
Route::get('/showreservations', [AdminController::class, 'showreservations']);
Route::get('/approved/{id}', [AdminController::class, 'approved']);

Route::get('/canceled/{id}', [AdminController::class, 'canceled']);
Route::get('admin/showreservation', 'AdminController@showreservation')->name('admin.showreservation');

Route::get('/showtoursite', [AdminController::class, 'showtoursite']);
Route::get('/deletetoursite/{id}', [AdminController::class, 'deletetoursite']); 
Route::get('/updatetoursite/{id}', [AdminController::class, 'updatetoursite']);
