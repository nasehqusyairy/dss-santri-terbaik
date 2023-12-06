<?php

namespace App\Http\Controllers;

use App\Models\Scale;
use Illuminate\Http\Request;

class ScaleController extends Controller
{
    public function index()
    {
        $scales = Scale::all();
        $title = 'Scale Index';
        return view('scales.index', compact('scales', 'title'));
    }

    public function create()
    {
        $title = 'Create Scale';
        return view('scales.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Scale::create($request->all());
        return redirect()->route('scales.index')->with('message', 'Scale created successfully');
    }

    public function show(Scale $scale)
    {
        $title = 'Show Scale';
        return view('scales.show', compact('scale', 'title'));
    }

    public function edit(Scale $scale)
    {
        $title = 'Edit Scale';
        return view('scales.edit', compact('scale', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scale $scale)
    {
        $scale->update($request->all());
        return redirect()->route('scales.index')->with('message', 'Scale updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scale $scale)
    {
        $scale->delete();
        return redirect()->route('scales.index')->with('message', 'Scale deleted successfully');
    }
}
