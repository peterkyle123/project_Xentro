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

    // **Step 1: Check for Duplicate Assigned House Numbers in the Same Block**
    foreach ($request->blocks ?? [] as $block) {
        $seenHouseNumbers = [];

        foreach ($block['houses'] ?? [] as $house) {
            $houseNumber = (int) $house['house_number'];

            // Check for duplicate in the request data
            if (in_array($houseNumber, $seenHouseNumbers)) {
                return redirect()->back()
                    ->withErrors(["Duplicate assigned house number ($houseNumber) in the same block."])
                    ->withInput();
            }

            // Store house number to track duplicates in this block
            $seenHouseNumbers[] = $houseNumber;
        }
    }

    // **Step 2: If No Duplicates Found, Proceed with Saving Everything**
    $subdivision = Subdivision::create([
        'sub_name'     => $request->sub_name,
        'image'        => $imagePath,
        'block_number' => $totalBlocks,
        'house_number' => 0, // Will be updated later
        'house_area'   => 0,
        'house_status' => 'Available'
    ]);

    $totalHouses = 0;

    foreach ($request->blocks ?? [] as $block) {
        $blockRecord = Block::create([
            'subdivision_id' => $subdivision->id,
            'block_area'     => $block['block_area'],
        ]);

        foreach ($block['houses'] ?? [] as $house) {
            House::create([
                'subdivision_id' => $subdivision->id,
                'block_id'       => $blockRecord->id,
                'house_area'     => $house['house_area'],
                'house_price'    => $house['house_price'],
                'assigned_house_number' => (int) $house['house_number'],
                'house_status'   => $house['house_status'],
            ]);

            $totalHouses++;
        }
    }

    // Update total houses in subdivision
    $subdivision->update(['house_number' => $totalHouses]);

    return redirect()->back()->with('success', 'Subdivision, blocks, and houses created successfully!');
}
public function show($id)
{
    // Retrieve subdivision along with blocks and their houses
    $subdivision = Subdivision::with(['blocks.houses'])->findOrFail($id);

    // Extract blocks and map them with their houses
    $blocks = $subdivision->blocks->map(function ($block) {
        return (object) [
            'block_id' => $block->id,  // Get block ID from the blocks table
            'block_area' => $block->block_area ?? 'N/A',  // Get block area from blocks table
            'houses' => $block->houses,  // Retrieve all houses for this block
        ];
    });

    return view('details', compact('subdivision', 'blocks'));
}



public function showHouses($id)
{
    $subdivision = Subdivision::with('houses')->findOrFail($id);
    return view('houses', compact('subdivision'));
}
public function details($id)
{
    $subdivision = Subdivision::with(['houses', 'houses.block'])->findOrFail($id);

    // Group houses by block_id
    $blocks = $subdivision->houses
        ->groupBy('block_id')
        ->map(function ($houses, $blockId) {
            // Get the first house's block (all houses in a group should have the same block)
            $block = $houses->first()->block;

            return (object)[
                'block_id'   => $blockId,
                'block_area' => $block ? $block->block_area : 'N/A', // Access block_area from Block
                'houses'     => $houses,
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

