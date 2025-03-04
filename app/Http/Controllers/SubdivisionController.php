<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subdivision;

class SubdivisionController extends Controller
{
    /**
     * Show the form for creating a new subdivision.
     */
    public function index()
    {
        return view('create_subdivision');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_name' => 'required|string|max:255',
            'sub_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        // Handle Image Upload
        if ($request->hasFile('sub_image')) {
            $imagePath = $request->file('sub_image')->store('subdivision_images', 'public');
        } else {
            $imagePath = null;
        }

        // Get last block number in DB
        $lastBlock = Subdivision::orderBy('block_number', 'desc')->first();
        $nextBlockNumber = $lastBlock ? $lastBlock->block_number + 1 : 1;

        // Store Subdivision Data
        $subdivision = Subdivision::create([
            'sub_name' => $request->sub_name,
            'image' => $imagePath,
            'block_number' => $nextBlockNumber,
            'block_area' => 0,  // Default, update dynamically if needed
            'house_number' => 0, // Default, update dynamically
            'house_area' => 0,   // Default
            'house_status' => 'Available'
        ]);

        return redirect()->back()->with('success', 'Subdivision created successfully!');
    }
}

