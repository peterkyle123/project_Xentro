<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Listing;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function create(Listing $listing)
    {
        return view('createinquiries', compact('listing'));
    }

    public function store(Request $request, Listing $listing)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_info' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $validatedData['listing_id'] = $listing->id;

        Inquiry::create($validatedData);

        return redirect()->route('user_listings.show', $listing->id)->with('success', 'Your inquiry has been submitted.');
    }
}