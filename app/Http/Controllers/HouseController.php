<?php

namespace App\Http\Controllers;

use App\Models\Subdivision;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
//     public function blocks(Subdivision $subdivision)
//     {
//         $subdivisions = Subdivision::all();
//         return view('edithouses', compact('subdivision', 'subdivisions'));
//     }

//     public function edit(Subdivision $subdivision, $block)
//     {
//         $subdivisions = Subdivision::all();
//         $houses = House::where('subdivision_id', $subdivision->id)
//                        ->where('block_number', $block)
//                        ->get();

//         return view('edithouses', compact('subdivision', 'block', 'houses', 'subdivisions'));
//     }

//     public function editForm(House $house)
// {
//     return view('edit-form', compact('house'));
// }
//     public function update(Request $request, House $house)
//     {
//         $request->validate([
//             'house_area' => 'required|numeric',
//             'house_price' => 'required|numeric',
//             'house_status' => 'required|string',
//         ]);

//         $house->update($request->all());

//         return redirect()->route('admin.houses.edit', ['subdivision' => $house->subdivision_id, 'block' => $house->block_number])
//                          ->with('success', 'House updated successfully!');
//     }
//     public function index()
// {
//     $houses = House::with('subdivision')->get(); // Fetch houses with their subdivisions
//     return view('houses', compact('houses'));
// }
}
