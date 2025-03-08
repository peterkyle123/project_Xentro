<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubQuery;

class SubQueryController extends Controller
{
    // Show the sub query form
    public function create()
    {
        return view('sub_query'); // This view corresponds to sub_query.blade.php
    }

    // Store sub query data
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address'      => 'required|string|max:255',
            'purpose'      => 'required|string|max:255',
            'lot'      => 'required|string|max:255',

        ]);

        // Process and store the sub query data, for example:
            SubQuery::create($validatedData);

        return redirect()->back()->with('success', 'Your query has been submitted!');
    }
}
