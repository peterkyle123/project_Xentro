<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subdivision;
use App\Models\House;

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
    
        $totalBlocks = isset($request->blocks) ? count($request->blocks) : 0;
        $totalHouses = 0;
    
        // Store Subdivision Data
        $subdivision = Subdivision::create([
            'sub_name' => $request->sub_name,
            'image' => $imagePath,
            'block_number' => $totalBlocks,
            'block_area' => 0,
            'house_number' => 0, // Initialize to 0, will update later
            'house_area' => 0,
            'house_status' => 'Available'
        ]);
    
        foreach ($request->blocks ?? [] as $blockIndex => $block) {
            $houseNumbers = [];
    
            foreach ($block['houses'] ?? [] as $houseIndex => $house) {
                $houseNumber = $house['house_number'] ?? null;
    
                if (in_array($houseNumber, $houseNumbers)) {
                    return redirect()->back()->withErrors([
                        "blocks.$blockIndex.houses.$houseIndex.house_number" =>
                        "Duplicate house number '{$houseNumber}' in Block " . ($blockIndex ) . "."
                    ])->withInput();
                }
    
                $houseNumbers[] = $houseNumber;
    
                // Create House record
                House::create([
                    'subdivision_id' => $subdivision->id,
                    'block_number' => $blockIndex + 1,
                    'house_number' => $houseNumber,
                    'house_area' => $house['house_area'] ?? 0,
                    'house_status' => $house['house_status'] ?? 'Available',
                    'assigned_house_number' => (int) $houseNumber, // Ensure it's an integer
                ]);
                $totalHouses++;
            }
        }
    
        // Update subdivision house_number
        $subdivision->update(['house_number' => $totalHouses]);
    
        return redirect()->back()->with('success', 'Subdivision and houses created successfully!');
    }

public function show()
{
    $subdivisions = Subdivision::all();
    return view('subdivisions', compact('subdivisions'));
}

}

