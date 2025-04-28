<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DisposalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KycController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\YearlyDisposalController;
use Illuminate\Support\Facades\Route;

Route::domain('console.localhost')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'loginPage'])->name('login');
        Route::post('login', [AuthController::class, 'login']);
    });

    Route::middleware('auth')->group(function () {

        Route::post('logout', [AuthController::class, 'logout'])
            ->name('logout');

        Route::name('console.')->group(function () {
            Route::get('/', [HomeController::class, 'index'])->name('home');
            Route::get('/banner', [BannerController::class, 'index'])->name('banner');
            Route::get('/getBanner', [BannerController::class, 'getBanner']);
            Route::get('/getBanner/{id}', [BannerController::class, 'getBannerById']);
            Route::post('/banner-store', [BannerController::class, 'store']);
            Route::put('/banner-update/{id}', [BannerController::class, 'update']);
            Route::delete('/banner-destroy/{id}', [BannerController::class, 'destroy']);

            // Services Routes
            Route::get('/services', [ServicesController::class, 'index'])->name('services');
            Route::get('/getService', [ServicesController::class, 'getService']);
            Route::get('/getService/{id}', [ServicesController::class, 'getServiceById']);
            Route::post('/service-store', [ServicesController::class, 'store']);
            Route::put('/service-update/{id}', [ServicesController::class, 'update']);
            Route::delete('/service-destroy/{id}', [ServicesController::class, 'destroy']);

            // Pricing Routes
            Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
            Route::get('/getPrice', [PricingController::class, 'getPrice']);
            Route::get('/getPrice/{id}', [PricingController::class, 'getPriceById']);
            Route::post('/pricing-store', [PricingController::class, 'store']);
            Route::put('/pricing-update/{id}', [PricingController::class, 'update']);
            Route::delete('/pricing-destroy/{id}', [PricingController::class, 'destroy']);

            // Routes for Complaints
            Route::get('/complaints', [ComplaintController::class, 'index'])->name('complaints');
            Route::get('/getComplaint', [ComplaintController::class, 'getComplaint']);
            Route::get('/getComplaint/{id}', [ComplaintController::class, 'getComplaintById']);
            Route::post('/complaints-store', [ComplaintController::class, 'store']);
            Route::put('/complaints-update/{id}', [ComplaintController::class, 'update']);
            Route::delete('/complaints-destroy/{id}', [ComplaintController::class, 'destroy']);

            // Routes for Disposal

            Route::get('/disposal', [DisposalController::class, 'index'])->name('disposal');
            Route::get('/getDisposal', [DisposalController::class, 'getDisposal']);
            Route::get('/getDisposal/{id}', [DisposalController::class, 'getDisposalById']);
            Route::post('/disposal-store', [DisposalController::class, 'store'])->name('disposal.store');
            Route::put('/disposal-update/{id}', [DisposalController::class, 'update'])->name('disposal.update');
            Route::delete('/disposal-destroy/{id}', [DisposalController::class, 'destroy'])->name('disposal.destroy');

            // Routes for Yearly Disposal
            Route::get('/disposalYear', [YearlyDisposalController::class, 'index'])->name('disposalYear');
            Route::get('/getDisposalYear', [YearlyDisposalController::class, 'getDisposalYear']);
            Route::get('/getDisposalYear/{id}', [YearlyDisposalController::class, 'getDisposalYearById']);
            Route::post('/disposalYear-store', [YearlyDisposalController::class, 'store'])->name('disposalYear.store');
            Route::put('/disposalYear-update/{id}', [YearlyDisposalController::class, 'update'])->name('disposalYear.update');
            Route::delete('/disposalYear-destroy/{id}', [YearlyDisposalController::class, 'destroy'])->name('disposalYear.destroy');

            // KYC Routes
            Route::get('/kyc', [KycController::class, 'index'])->name('kyc');
            Route::get('/getKyc', [KycController::class, 'getKyc']);
            Route::get('/getKyc/{id}', [KycController::class, 'getKycById']);
            Route::get('/kycPrint/{id}', [KycController::class, 'kycPrint'])->name('kycPrint');

            // Contact Routes
            Route::get('/contact', [ContactController::class, 'index'])->name('contact');
            Route::get('/getContact', [ContactController::class, 'getContact']);

            // Settings Routes
            Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
            Route::get('/getSettings', [SettingsController::class, 'getSettings']);
            Route::put('/settings', [SettingsController::class, 'update']);
        });
    });
});
