<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SubQuery;
use App\Models\Subdivision;

class SubQueryController extends Controller
{
    // Show the sub query form
    public function create(Request $request) // Inject the Request object here
    {
        $subdivisionId = $request->input('subdivision_id');
        $subdivision = null;

        if ($subdivisionId) {
            $subdivision = Subdivision::find($subdivisionId);
        }

        return view('sub_query', compact('subdivision', 'subdivisionId'));
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
            'block'      => 'required|string|max:255',

        ]);

        // Process and store the sub query data, for example:
            SubQuery::create($validatedData);

        return redirect()->back()->with('success', 'Your query has been submitted!');
    }
    public function index()
    {
        $queries = SubQuery::all(); // Fetch all queries from the database
        return view('/viewsubquery', compact('queries')); // Pass data to Blade view
    }
    public function destroy($id)
{
    $query = SubQuery::findOrFail($id);
    $query->delete();

    return redirect()->route('admin.queries.index')->with('success', 'Query deleted successfully.');
}
}
