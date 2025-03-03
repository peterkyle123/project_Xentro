<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function create()
    {
        $teamMembers = Team::all(); // Fetch all team members
        return view('create_team', compact('teamMembers')); // Pass to view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|email|unique:team,email',
            'motto' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:5000', // Validate image format and size
        ]);

        // Handle Image Upload
        $profilePicPath = null;
        if ($request->hasFile('image')) {
            $profilePicPath = $request->file('image')->store('images', 'public'); // Save in storage/app/public/images
        }

        // Store Data in the Database
        Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'motto' => $request->motto,
            'image' => $profilePicPath, // Save path in DB
        ]);

        return redirect()->route('team.create')->with('success', 'Team member added successfully!');
    }
    public function show($id)
    {
        $member = Team::findOrFail($id);
        return view('team_index', compact('member'));
    }
}
