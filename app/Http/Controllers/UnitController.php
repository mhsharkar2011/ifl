<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
        return view('units.index', ['units' => $units]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $unit = new Unit();
        $unit->name = $request->input('name');
        $unit->save();
        return redirect()->route('units.index')->with('status', 'Unit created successfully');
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
    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $unit->update([
            'name' => $request->name,
        ]);

        return redirect()->route('units.index')->with('success', 'Unit updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    { {
            if ($unit->products()->count() > 0) {
                return redirect()->route('units.index')
                    ->with('error', 'Cannot delete unit with existing products.');
            }

            try {
                $unit->delete();   // delete the unit

                return redirect()->route('units.index')->with('success', 'Unit deleted successfully.');
            } catch (\Exception $e) {
                return redirect()->route('units.index')
                    ->with('error', 'Failed to delete unit: ' . $e->getMessage());
            }
        }
    }
}
