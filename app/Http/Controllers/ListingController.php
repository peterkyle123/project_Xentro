<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $listings = Listing::select(
            'id',
            'title',
            'type',
            'category',
            'housing_type',
            'custom_housing_type',
            'price',
            'address',
            'city',
            'state',
            'zip',
            'bedrooms',
            'bathrooms',
            'area',
            'status',
            'image',
            'latitude',
            'longitude',
            'contact_name',
            'contact_email',
            'contact_phone',
            'is_featured',
            'likes',


        );

     // Apply category filter if provided
     if ($request->filled('category')) {
        $listings->where('category', $request->category);
    }

    // Apply search filter if provided
    if ($request->filled('search')) {
        $searchTerm = '%' . $request->search . '%';
        $listings->where(function ($query) use ($searchTerm) {
            $query->where('title', 'like', $searchTerm)
                ->orWhere('city', 'like', $searchTerm)
                ->orWhere('state', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm);
        });
    }

    // Apply sorting if provided
    if ($request->filled('sort')) {
        switch ($request->sort) {
            case 'price_asc':
                $listings->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $listings->orderBy('price', 'desc');
                break;
            case 'area_asc':
                $listings->orderBy('area', 'asc');
                break;
            case 'area_desc':
                $listings->orderBy('area', 'desc');
                break;
            // Add more sorting options as needed
        }
    }


        $listings = $listings->paginate(6);

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
         // Add likes and liked_sessions to the validated data
            $validatedData['likes'] = 0; // Initialize likes to 0
            $validatedData['liked_sessions'] = json_encode([]); // Initialize liked_sessions as an empty JSON array
        Listing::create($validatedData);

        return redirect()->route('admin.listings.index')->with('success', 'Listing created successfully.');
    }

    public function show(Listing $listing)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('show', compact('listing'));
    }

    public function edit(Listing $listing)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
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
            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($listing->image) {
                    Storage::disk('public')->delete($listing->image);
                }

                // Store new image
                $imagePath = $request->file('image')->store('listings', 'public');

                // Add to validated data array
                $validatedData['image'] = $imagePath;
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
    public function userIndex(Request $request)
{
    $listings = Listing::query(); // Start with a fresh query builder

    // Apply category filter if provided
    if ($request->filled('category')) {
        $listings->where('category', $request->category);
    }

    // Apply search filter if provided
    if ($request->filled('search')) {
        $searchTerm = '%' . $request->search . '%';
        $listings->where(function ($query) use ($searchTerm) {
            $query->where('title', 'like', $searchTerm)
                ->orWhere('city', 'like', $searchTerm)
                ->orWhere('state', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm);
        });
    }

    // Apply sorting if provided
    if ($request->filled('sort')) {
        switch ($request->sort) {
            case 'price_asc':
                $listings->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $listings->orderBy('price', 'desc');
                break;
            case 'area_asc':
                $listings->orderBy('area', 'asc');
                break;
            case 'area_desc':
                $listings->orderBy('area', 'desc');
                break;
            // Add more sorting options as needed
        }
    }

    $listings = $listings->paginate(9);

    return view('user_listings.index', compact('listings'));
}

public function userShow(Listing $listing)
{
    return view('user_listings.show', compact('listing'));
}
public function toggleFeatured(Listing $listing)
{
    $listing->is_featured = !$listing->is_featured;
    $listing->save();

    return redirect()->route('admin.listings.index')->with('success', 'Featured status updated.');
}
public function like(Listing $listing)
{
    $sessionId = session()->getId();
    $likedSessions = json_decode($listing->liked_sessions, true) ?: [];

    if (in_array($sessionId, $likedSessions)) {
        // Unlike
        $listing->likes--;
        $likedSessions = array_diff($likedSessions, [$sessionId]);
    } else {
        // Like
        $listing->likes++;
        $likedSessions[] = $sessionId;
    }

    $listing->liked_sessions = json_encode($likedSessions);
    $listing->save();

    return response()->json([
        'liked' => in_array($sessionId, json_decode($listing->liked_sessions, true) ?: []),
        'likes' => $listing->likes,
    ]);
}
}
