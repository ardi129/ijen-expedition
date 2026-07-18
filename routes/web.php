<?php

use App\Http\Controllers\Admin\AdminRecapController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TourPackageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/search', SearchController::class)->name('search');

Route::controller(TourPackageController::class)->group(function () {
    Route::get('/paket-wisata', 'index')->name('packages.index');
    Route::get('/paket-wisata/{tourPackage:slug}', 'show')->name('packages.show');
});

Route::controller(DestinationController::class)->group(function () {
    Route::get('/destinasi', 'index')->name('destinations.index');
    Route::get('/destinasi/{destination:slug}', 'show')->name('destinations.show');
});

Route::post('/paket-wisata/{tourPackage:slug}/review', [ReviewController::class, 'store'])->name('reviews.store');

Route::controller(BookingController::class)->group(function () {
    Route::get('/booking/{tourPackage:slug}', 'create')->name('booking.create');
    Route::post('/booking', 'store')->name('booking.store');
});

Route::controller(ArticleController::class)->group(function () {
    Route::get('/artikel', 'index')->name('articles.index');
    Route::get('/artikel/{article:slug}', 'show')->name('articles.show');
});

Route::controller(PageController::class)->group(function () {
    Route::get('/tentang-kami', 'about')->name('about');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/kontak', 'contact')->name('contact');
    Route::get('/syarat-ketentuan', 'terms')->name('terms');
    Route::get('/kebijakan-privasi', 'privacy')->name('privacy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/recap-pdf', [AdminRecapController::class, 'recapPdf'])->name('admin.recap.pdf');
});
