<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
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
    return redirect('login');
});

Route::get('/home', [HomeController::class, 'index']);

Route::post('/home/book', [HomeController::class, 'book'])->name('bookAppointment');

Route::get('/home/appointments', [HomeController::class, 'appointments']);

Auth::routes();

Route::get('/admin/home', [AdminController::class, 'index']);

Route::post('/admin/home/{id}', [AdminController::class, 'approve'])->name('approveAppointment');



