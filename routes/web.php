<?php

use App\Models\Listing;
use App\Models\Team;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutUsAdminController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SubdivisionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LogoutController;

Route::get('/', function () {
    $featuredListings = Listing::where('is_featured', true)->get();
    // ... other logic
    return view('welcome', compact('featuredListings'));
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

// Admin Routes (Grouped)
Route::prefix('admin')->name('admin.')->group(function () {
    // Listings
    Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');
    Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
    Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');
    Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');
    Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->name('listings.edit');
    Route::put('/listings/{listing}', [ListingController::class, 'update'])->name('listings.update');
    Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->name('listings.destroy');
    Route::post('/listings/{listing}/toggleFeatured', [ListingController::class, 'toggleFeatured'])->name('listings.toggleFeatured');

    // Inquiries
    Route::delete('/inquiries/bulk-delete', [InquiryController::class, 'bulkDelete'])->name('inquiries.bulkDelete');
    Route::get('/inquiries', [InquiryController::class, 'viewInquiries'])->name('inquiries.view');

    // Admin Account Editing
  // Admin Account Editing
  
});
Route::get('/admin-edit', [AdminController::class, 'edit'])->name('admin-edit');
Route::put('/admin/update', [AdminController::class, 'update'])->name('admin.update');

Route::get('/user-listings1', [ListingController::class, 'userIndex'])->name('user_listings.index');
Route::get('/user-listings/{listing}', [ListingController::class, 'userShow'])->name('user_listings.show');

// Inquiries (Front-end)
Route::get('/inquiries/{listing}', [InquiryController::class, 'create'])->name('inquiries.create');
Route::post('/inquiries/{listing}', [InquiryController::class, 'store'])->name('inquiries.store');

// Listings (Front-end)
Route::post('/listings/{listing}/like', [ListingController::class, 'like']);

// About Us and Team
Route::get('/about', function () {
    $teamMembers = Team::all();
    return view('about', compact('teamMembers'));
});

Route::get('/create-team', [TeamController::class, 'create'])->name('team.create');
Route::post('/store-team', [TeamController::class, 'store'])->name('team.store');
// NGH blade
Route::get('/ngh-subdivision', function () {
    return view('NGH_sud');
});
Route::get('/team/{id}', [TeamController::class, 'show'])->name('team.show');

Route::get('/create_subdivision', [SubdivisionController::class, 'index']);
Route::post('/store_subdivision', [SubdivisionController::class, 'store'])->name('store_subdivision');
Route::get('/subdivisions', [SubdivisionController::class, 'show'])->name('subdivision.show');
// contact_info
Route::get('/contact', function () {
    return view('contact');
});
