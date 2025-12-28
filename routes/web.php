<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('rooms', App\Http\Controllers\RoomController::class);
    Route::resource('clients', App\Http\Controllers\ClientController::class);
    Route::resource('reservations', App\Http\Controllers\ReservationController::class);
    Route::resource('employees', App\Http\Controllers\EmployeeController::class);
    Route::resource('invoices', App\Http\Controllers\InvoiceController::class)->parameters(['invoices' => 'reservation']);
    Route::get('invoices/{reservation}/download', [App\Http\Controllers\InvoiceController::class, 'download'])->name('invoices.download');
    Route::get('/statistics', [App\Http\Controllers\StatisticsController::class, 'index'])->name('statistics.index');
});

require __DIR__.'/auth.php';
