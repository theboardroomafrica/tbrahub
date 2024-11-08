<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\ClientAuthMiddleware;
use App\Http\Middleware\VerifyClientApproval;
use Illuminate\Support\Facades\Route;

Route::get('/', function (\App\Repository\PaymentGateway $paymentGateway) {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cv', function () {
    return view('cv');
});

Route::get('/creg', function () {
    return view('creg');
});

Route::get('/clients/submitted', fn() => view('clients.status'))->name('clients.submitted');

Route::middleware(ClientAuthMiddleware::class)->controller(ClientController::class)->group(function () {
    Route::get('/clients/status', 'status')->name('clients.status');
    Route::get('/clients/pay', 'pay')->name('clients.pay');
    Route::get('/clients/pricing', 'pricing')->name('clients.pricing')->middleware([VerifyClientApproval::class]);
});

Route::controller(PaymentController::class)->name('payment.')->prefix('/payment')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/success', 'success')->name("success");
    Route::get('/cancel', 'cancel')->name("cancel");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/r/{user}', [ProfileController::class, 'show'])->name('profile.show');

require __DIR__ . '/auth.php';
