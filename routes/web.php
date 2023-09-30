<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

/* Ticket */
Route::get('/ticket', 'App\Http\Controllers\TicketController@index')->name('ticket.index');
Route::get('/ticket/create', 'App\Http\Controllers\TicketController@create')->name('ticket.create');
Route::post('/ticket', 'App\Http\Controllers\TicketController@store')->name('ticket.store');

/* Admin Routes */
Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('admin.index');

    /* Department */
    Route::get('/department', 'App\Http\Controllers\DepartmentController@index')->name('department.index');
    Route::get('/department/create', 'App\Http\Controllers\DepartmentController@create')->name('department.create');
    Route::post('/department', 'App\Http\Controllers\DepartmentController@store')->name('department.store');

    /* Status */
    Route::get('/status', 'App\Http\Controllers\StatusController@index')->name('status.index');
    Route::get('/status/create', 'App\Http\Controllers\StatusController@create')->name('status.create');
    Route::post('/status', 'App\Http\Controllers\StatusController@store')->name('status.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
