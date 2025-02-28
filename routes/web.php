<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InquiryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LogoutController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Login
Route::get('/admin/login', function () {
    return view('admin-login');
});

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

// Admin Dashboard
Route::get('/admin/dashboard', function () {
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }
    return view('admin-dashboard');
})->name('admin.dashboard');

// Logout
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Listings
Route::prefix('admin')->group(function () {
    Route::get('/listings', [ListingController::class, 'index'])->name('admin.listings.index');
    Route::get('/listings/create', [ListingController::class, 'create'])->name('admin.listings.create');
    Route::post('/listings', [ListingController::class, 'store'])->name('admin.listings.store');
    Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('admin.listings.show');
    Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->name('admin.listings.edit');
    Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('admin.listings.update');
    Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('admin.listings.destroy');
});
Route::get('/admin-edit', [AdminController::class, 'edit'])->name('admin-edit');
Route::put('/admin/update', [AdminController::class, 'update'])->name('admin.update');
Route::get('/user-listings1', [ListingController::class, 'userIndex'])->name('user_listings.index');
Route::get('/user-listings/{listing}', [ListingController::class, 'userShow'])->name('user_listings.show');
Route::get('/inquiries/{listing}', [InquiryController::class, 'create'])->name('inquiries.create');
Route::post('/inquiries/{listing}', [InquiryController::class, 'store'])->name('inquiries.store');
Route::get('/admin/inquiries', [InquiryController::class, 'viewInquiries'])->name('admin.inquiries.index');
Route::delete('/admin/inquiries/bulk-delete', [InquiryController::class, 'bulkDelete'])->name('admin.inquiries.bulkDelete');