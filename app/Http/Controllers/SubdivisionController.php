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
    $imagePath = $request->hasFile('sub_image') 
        ? $request->file('sub_image')->store('subdivision_images', 'public') 
        : null;

    // Count total blocks added in the request
    $totalBlocks = isset($request->blocks) ? count($request->blocks) : 0;
    
 // Count total houses across all blocks
        $totalHouses = 0;
        foreach ($request->blocks ?? [] as $block) {
            $totalHouses += isset($block['houses']) ? count($block['houses']) : 0;
        }

    // Store Subdivision Data
    $subdivision = Subdivision::create([
        'sub_name' => $request->sub_name,
        'image' => $imagePath,
        'block_number' => $totalBlocks, // Store total number of blocks
        'block_area' => 0,
        'house_number' => $totalHouses, // Store total number of houses
        'house_area' => 0,
        'house_status' => 'Available'
    ]);

    return redirect()->back()->with('success', 'Subdivision created successfully!');
}
public function show()
{
    $subdivisions = Subdivision::all();
    return view('subdivisions', compact('subdivisions'));
}

}

