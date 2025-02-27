<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $admin = Admin::where('username', $credentials['username'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            session(['admin_logged_in' => true]); // Store session
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid username or password.');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in');

        return redirect('/');
    }
    public function edit()
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login'); // Redirect if not logged in
        }
        $admin = Admin::first(); // Assuming only one admin user, or adjust as needed.
        return view('admin-edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Admin::first(); // Assuming only one admin user, or adjust as needed.

        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:admin_login,username,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin->username = $validatedData['username'];

        if ($request->filled('password')) {
            $admin->password = Hash::make($validatedData['password']);
        }

        $admin->save();

        return redirect()->route('admin-edit')->with('success', 'Admin account updated successfully.');
    }
}

