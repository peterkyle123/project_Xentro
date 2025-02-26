<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Dummy data for demonstration purposes
        $totalListings = 150;
        $activeListings = 120;
        $pendingListings = 30;
        $totalUsers = 500;
        $newUsers = 25;
        $recentInquiries = [
            (object) ['id' => 1, 'name' => 'John Doe', 'subject' => 'Property Inquiry'],
            (object) ['id' => 2, 'name' => 'Jane Smith', 'subject' => 'Listing Question'],
            (object) ['id' => 3, 'name' => 'Peter Jones', 'subject' => 'Schedule Viewing'],
            (object) ['id' => 4, 'name' => 'Alice Brown', 'subject' => 'Offer Details'],
            (object) ['id' => 5, 'name' => 'David Lee', 'subject' => 'More Information'],
        ];
        $recentListings = [
            (object) ['id' => 10, 'title' => 'Luxury Apartment in City Center'],
            (object) ['id' => 11, 'title' => 'Spacious Family Home with Garden'],
            (object) ['id' => 12, 'title' => 'Modern Condo with River View'],
            (object) ['id' => 13, 'title' => 'Commercial Space in Prime Location'],
            (object) ['id' => 14, 'title' => 'Rustic Cottage in the Countryside'],
        ];

        return view('admin.dashboard', compact('totalListings', 'activeListings', 'pendingListings', 'totalUsers', 'newUsers', 'recentInquiries', 'recentListings'));
    }
}