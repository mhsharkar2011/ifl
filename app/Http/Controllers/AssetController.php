<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::all();
        return view('assets.index',compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $asset = new Asset();
        $asset->name = $request->input('name');
        $asset->cat_name = $request->input('categories_id');
        $asset->brand_name = $request->input('brand_id');
        $asset->model = $request->input('model');
        $asset->processor = $request->input('processor');
        $asset->details = $request->input('details');
        $asset->image = $request->input('image');
        $asset->save();
        return redirect()->route('assets.index')->with('status', 'Asset created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        //
    }
}
