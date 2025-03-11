<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SubQuery;
use App\Models\Subdivision;
use Illuminate\Database\QueryException;

class SubQueryController extends Controller
{
    // Show the sub query form
    public function create($subdivision_id)
    {
        // Fetch the subdivision, or return a 404 error if not found
        $subdivision = Subdivision::findOrFail($subdivision_id);

        return view('sub_query', compact('subdivision'));
    }
    // Store sub query data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address'      => 'required|string|max:255',
            'purpose'      => 'required|string|max:255',
            'lot'          => 'required|string|max:255',
            'block'        => 'required|string|max:255',
            'subdivision_id' => 'required|exists:ngh,id', // FIXED: Use 'ngh' instead of 'subdivisions'
        ]);

        try {
            SubQuery::create($validatedData);
            return redirect()->back()->with('success', 'Sub Query submitted successfully!');
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Error Code 1062 = Duplicate Entry
                return redirect()->back()->with('error', 'This email has already submitted a query.');
            }
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function index()
    {
        $queries = SubQuery::with('subdivision')->get();  // Fetch all queries from the database
        return view('/viewsubquery', compact('queries')); // Pass data to Blade view
    }
    public function destroy($id)
{
    $query = SubQuery::findOrFail($id);
    $query->delete();

    return redirect()->route('admin.queries.index')->with('success', 'Query deleted successfully.');
}
}
