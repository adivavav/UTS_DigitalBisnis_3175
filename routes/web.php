<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PartnerController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/event/{id}', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/checkout', [EventController::class, 'checkout'])
    ->name('checkout');

Route::get('/my-ticket', [TicketController::class, 'index'])
    ->name('ticket');



Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/events', [AdminEventController::class, 'index'])->name('events');

    Route::get('/transactions', function () {
        return view('admin.transactions');
    })->name('transactions');

    Route::resource('events', AdminEventController::class);

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/partners', [PartnerController::class, 'index']);

    Route::post('/partners', [PartnerController::class, 'store']);
    Route::get('/partners/{id}/edit', [PartnerController::class, 'edit'])
    ->name('partners.edit');

Route::put('/partners/{id}', [PartnerController::class, 'update'])
    ->name('partners.update');

Route::delete('/partners/{id}', [PartnerController::class, 'destroy'])
    ->name('partners.destroy');

    Route::post('/categories', [CategoryController::class, 'store'])
    ->name('categories.store');

Route::put('/categories/{id}', [CategoryController::class, 'update'])
    ->name('categories.update');

Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
    ->name('categories.destroy');
});

