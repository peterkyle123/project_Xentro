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
}
