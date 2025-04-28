<?php

use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\ComplaintController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\DisposalController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\KycController;
use App\Http\Controllers\Public\PaymentController;
use App\Http\Controllers\Public\PricingController;
use App\Http\Controllers\Public\ServicesController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/admin.php';

Route::name('public.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
    Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
    Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint');
    Route::get('/disposal', [DisposalController::class, 'index'])->name('disposal');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/kycForm', [KycController::class, 'index'])->name('kyc');
    Route::post('/kycForm', [KycController::class, 'store'])->name('kyc.store');
});
