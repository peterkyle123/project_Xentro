<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::select('id', 'title', 'type', 'category', 'housing_type','custom_housing_type', 'price', 'address', 'city', 'state', 'zip', 'bedrooms', 'bathrooms', 'area', 'status')
        ->paginate(6);
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        $listings = Listing::paginate(6);
        return view('listings', compact('listings'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:50',
            'housing_type' => 'nullable|string|max:50',
            'custom_housing_type' => 'nullable|string|max:50',
            'type' => 'required|string|max:50',
            'price' => 'nullable|numeric',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|numeric|min:0',
            'area' => 'nullable|numeric|min:0',
            'status' => 'required|string|max:50',
            'image' => 'required|image|max:5000', 
            'latitude' => 'nullable|numeric', // Added validation for latitude
            'longitude' => 'nullable|numeric',
            'contact_name' => 'required|string|max:255', // Added validation
            'contact_email' => 'required|email|max:255', // Added validation
            'contact_phone' => 'nullable|string|max:20', 
        ]);


    // If housing_type is not "Other", clear custom_housing_type
    if ($request->housing_type !== 'Other') {
        $validatedData['custom_housing_type'] = null;
    }
        // Check if the image file is present in the request
        if ($request->hasFile('image')) {
            // dd($request->file('image')); // Uncomment this for debugging to inspect the file
            
            // Store the image in the 'public/images' folder under the 'public' disk
            $imagePath = $request->file('image')->store('images', 'public');
            
            // Store the image path (relative to the public disk)
            $validatedData['image'] = $imagePath;
        }
        Listing::create($validatedData);
    
        return redirect()->route('admin.listings.index')->with('success', 'Listing created successfully.');
    }

    public function show(Listing $listing)
    {
        return view('show', compact('listing'));
    }

    public function edit(Listing $listing)
    {
        return view('edit', compact('listing'));
    }

    public function update(Request $request, Listing $listing)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:50',
            'housing_type' => 'nullable|string|max:50',
            'custom_housing_type' => 'nullable|string|max:50',
            'type' => 'required|string|max:50',
            'price' => 'nullable|numeric',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:20', // Zip codes can be alphanumeric
            'bedrooms' => 'nullable|integer|min:0', // Bedrooms should be a non-negative integer
            'bathrooms' => 'nullable|numeric|min:0', // Bathrooms can be fractional (e.g., 1.5)
            'area' => 'nullable|numeric|min:0', // Area should be a non-negative number
            'status' => 'required|string|max:50',
           'image' => 'nullable|image|max:5000',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'contact_name' => 'nullable|string|max:255', // Make nullable
        'contact_email' => 'nullable|email|max:255', // Make nullable
        'contact_phone' => 'nullable|string|max:20', // Make nullable

        ]);
           // If housing_type is not "Other", clear custom_housing_type
            if ($request->housing_type !== 'Other') {
                $validatedData['custom_housing_type'] = null;
            }
           // Handle image upload only if a new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($listing->image) {
                Storage::disk('public')->delete($listing->image);
            }

        $imagePath = $request->file('image')->store('listings', 'public');
        $listing->image = $imagePath;
        $listing->save(); // Save the listing again to store the image path
    }
        $listing->update($validatedData);

        return redirect()->route('admin.listings.index')->with('success', 'Listing updated successfully.');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->route('admin.listings.index')->with('success', 'Listing deleted successfully.');
    }
    // user
    public function userIndex()
{
    $listings = Listing::paginate(9); // Or another number of listings per page
    return view('user_listings.index  ', compact('listings'));
}

public function userShow(Listing $listing)
{
    return view('user_listings.show', compact('listing'));
}
}