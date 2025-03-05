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
    
        $imagePath = $request->file('sub_image')->store('subdivision_images', 'public');
    
        $totalBlocks = isset($request->blocks) ? count($request->blocks) : 0;
        $totalHouses = 0;
    
        foreach ($request->blocks ?? [] as $blockIndex => $block) {
            $houseNumbers = [];
    
            foreach ($block['houses'] ?? [] as $houseIndex => $house) {
                $assignedHouseNumber = $house['assigned_house_number'] ?? null;
    
                // Check for duplicate assigned_house_number within the same block
                if (in_array($assignedHouseNumber, $houseNumbers)) {
                    return redirect()->back()->withErrors([
                        "blocks.$blockIndex.houses.$houseIndex.assigned_house_number" =>
                            "Duplicate assigned house number '{$assignedHouseNumber}' in Block " . ($blockIndex + 1) . "."
                    ])->withInput();
                }
    
                $houseNumbers[] = $assignedHouseNumber;
                $totalHouses++;
            }
        }
    
        $subdivision = Subdivision::create([
            'sub_name' => $request->sub_name,
            'image' => $imagePath,
            'block_number' => $totalBlocks,
            'block_area' => 0,
            'house_number' => $totalHouses,
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

