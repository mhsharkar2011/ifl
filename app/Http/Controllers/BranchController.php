<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Location;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::with('location')->paginate(10); // eager load
        return view('branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $locations = Location::all();
        return view('branches.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'location_id' => 'required|exists:locations,id',
            'status'      => 'boolean',
        ]);

        Branch::create($validated);

        return redirect()->route('branches.index')
                         ->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        $locations = Location::all();
        return view('branches.edit', compact('branch', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'location_id' => 'required|exists:locations,id',
            'status'      => 'boolean',
        ]);

        $branch->update($validated);

        return redirect()->route('branches.index')
                         ->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')
                         ->with('success', 'Branch deleted successfully.');
    }

     /**
     * Restore a soft-deleted branch.
     */
    public function restore($id)
    {
        $branch = Branch::withTrashed()->findOrFail($id);
        $branch->restore();

        return redirect()->route('branches.index')
                         ->with('success', 'Branch restored successfully.');
    }

    /**
     * Permanently delete a branch.
     */
    public function forceDelete($id)
    {
        $branch = Branch::withTrashed()->findOrFail($id);
        $branch->forceDelete();

        return redirect()->route('branches.index')
                         ->with('success', 'Branch permanently deleted.');
    }
}
