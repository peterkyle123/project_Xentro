<?php

use App\Models\Listing;
use App\Models\Team;
use App\Models\Subdivision;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutUsAdminController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SubdivisionController;
use App\Http\Controllers\SubQueryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HouseController;

Route::get('/', function () {
    $featuredListings = Listing::where('is_featured', true)->get();
    // ... other logic
    return view('welcomes', compact('featuredListings'));
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
// 2️⃣ Second Page: Show Single Subdivision Details
Route::get('/ngh-subdivision/{subdivision_id}', [SubdivisionController::class, 'show'])
    ->name('subdivision.show');

Route::get('/team/{id}', [TeamController::class, 'show'])->name('team.show');

Route::get('/create_subdivision', [SubdivisionController::class, 'index']);
Route::post('/subdivisions/store', [SubdivisionController::class, 'store'])->name('store_subdivision');
// Route::get('/subdivisions', [SubdivisionController::class, 'show'])->name('subdivision.show');
// contact_info
Route::get('/contact', function () {
    return view('contact');
});
// Admin- side subdivisions listing
Route::get('/subdivisions', [SubdivisionController::class, 'Adminindex'])->name('subdivisions.index');

// Admin-facing subdivision details
Route::get('/subdivisions/{subdivision}/details', [SubdivisionController::class, 'details'])->name('subdivisions.details');
Route::get('/subdivisions/{id}', [SubdivisionController::class, 'show'])->name('subdivisions.show');
// user- subdivision
Route::get('/user/subdivisions', [SubdivisionController::class, 'showSubdivisions'])->name('Usersubdivisions.show');
// Admin-facing subdivision edit
Route::get('/subdivisions/edit/{id}', [SubdivisionController::class, 'edit'])->name('edit_subdivision');
Route::put('/subdivisions/update/{id}', [SubdivisionController::class, 'update'])->name('update_subdivision');
Route::delete('/subdivisions/delete/{id}', [SubdivisionController::class, 'destroy'])->name('delete_subdivision');
// BLOCKS AND HOUSES
Route::delete('/block/{id}', [SubdivisionController::class, 'destroyBlock'])->name('destroyBlock');
Route::delete('/house/{id}', [SubdivisionController::class, 'destroyHouse'])->name('destroyHouse');
// Sub Query Routes
Route::get('/sub-query/{subdivision_id}', [SubQueryController::class, 'create'])
    ->name('sub_queries.create');
Route::post('/sub-queries', [SubQueryController::class, 'store'])->name('sub_queries.store');

Route::get('/admin/queries', [SubQueryController::class, 'index'])->name('admin.queries.index');
Route::delete('/admin/queries/{id}', [SubQueryController::class, 'destroy'])->name('queries.destroy');
