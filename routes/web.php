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
Route::get('ticket/{ticket}', 'App\Http\Controllers\TicketController@show')->name('ticket.show');
Route::get('ticket/{ticket}/edit', 'App\Http\Controllers\TicketController@edit')->name('ticket.edit');
Route::put('ticket/{ticket}', 'App\Http\Controllers\TicketController@update')->name('ticket.update');



/* Admin Routes */
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');
Route::get('/admin/show/{id}', 'App\Http\Controllers\AdminController@show')->name('admin.show');
Route::get('/admin/{id}/edit', 'App\Http\Controllers\AdminController@edit')->name('admin.edit');
Route::put('/admin/{id}/', 'App\Http\Controllers\AdminController@update')->name('admin.update');

//Route::middleware(['auth', 'admin'])->group(function (){
    //Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');

    /* Department 
    Route::get('/department', 'App\Http\Controllers\DepartmentController@index')->name('department.index');
    Route::get('/department/create', 'App\Http\Controllers\DepartmentController@create')->name('department.create');
    Route::post('/department', 'App\Http\Controllers\DepartmentController@store')->name('department.store'); */

    /* Status 
    Route::get('/status', 'App\Http\Controllers\StatusController@index')->name('status.index');
    Route::get('/status/create', 'App\Http\Controllers\StatusController@create')->name('status.create');
    Route::post('/status', 'App\Http\Controllers\StatusController@store')->name('status.store');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
