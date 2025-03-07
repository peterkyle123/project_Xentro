<?php

namespace App\Http\Controllers;
use App\Models\Block;
use Illuminate\Http\Request;
use App\Models\Subdivision;
use App\Models\House;
use Illuminate\Validation\Rule;
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
            'sub_name'   => 'required|string|max:255',
            'sub_image'  => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        // Handle Image Upload
        $imagePath = $request->hasFile('sub_image')
            ? $request->file('sub_image')->store('subdivision_images', 'public')
            : null;

        $totalBlocks = is_array($request->blocks) ? count($request->blocks) : 0;

        // Create subdivision
        $subdivision = Subdivision::create([
            'sub_name'     => $request->sub_name,
            'image'        => $imagePath,
            'block_number' => $totalBlocks, // Store total blocks
            'house_number' => 0, // Will be updated later
            'house_area'   => 0,
            'house_status' => 'Available'
        ]);

        $totalHouses = 0; // Initialize total houses

        // Loop through blocks and store in `blocks` table
        foreach ($request->blocks ?? [] as $block) {
            $blockRecord = Block::create([
                'subdivision_id' => $subdivision->id,
                'block_area'     => $block['block_area'],
            ]);

            // Check if the 'houses' array exists and is not empty
            if (!empty($block['houses']) && is_array($block['houses'])) {
                foreach ($block['houses'] as $house) {
                    House::create([
                        'subdivision_id' => $subdivision->id,
                        'block_id'       => $blockRecord->id, // Correct foreign key reference
                        'house_area'     => $house['house_area'],
                        'house_price'    => $house['house_price'],
                        'assigned_house_number' => (int) $house['house_number'],
                        'house_status'   => $house['house_status'],
                    ]);

                    $totalHouses++; // Increment house count correctly
                }
            }
        }

        // Ensure `house_number` updates correctly in the `ngh` table
        $subdivision->update(['house_number' => $totalHouses]);

        return redirect()->back()->with('success', 'Subdivision, blocks, and houses created successfully!');
    }

public function show($id)
{
    $subdivision = Subdivision::with('houses')->findOrFail($id);

    // Extract unique blocks from houses
    $blocks = $subdivision->houses
        ->groupBy('block_number') // Group houses by block_number
        ->map(function ($houses, $blockNumber) {
            return (object) [
                'block_number' => $blockNumber,
                'block_area' => $houses->first()->block_area ?? 'N/A', // Blocks have the same area per group
                'houses' => $houses,
            ];
        });

    return view('/details', compact('subdivision', 'blocks'));
}

public function showHouses($id)
{
    $subdivision = Subdivision::with('houses')->findOrFail($id);
    return view('houses', compact('subdivision'));
}
public function details($id)
{
    $subdivision = Subdivision::with('houses')->findOrFail($id);

    // Group houses by block_id (ensure block_id is set for each house)
    $blocks = $subdivision->houses
        ->groupBy('block_id')
        ->map(function ($houses, $blockId) {
            return (object)[
                'block_id'    => $blockId,
                // Assuming all houses in the same block share the same block area:
                'block_area'  => $houses->first()->block_area ?? 'N/A',
                'houses'      => $houses,
            ];
        });

    return view('/details', compact('subdivision', 'blocks'));
}
public function Userindex()
{
    $subdivisions = Subdivision::all();
    return view('userSub', compact('subdivisions'));
}

}

