<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TableController;
use App\Http\Controllers\ReservationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/tables', [TableController::class, 'index'])->name('table.index');
Route::get('/reserve', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reserve', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/waitinglist', [ReservationController::class, 'waitingList'])->name('reservation.waitinglist');
Route::get('/table/free/{id}', [TableController::class, 'freeTable'])->name('table.freetable');