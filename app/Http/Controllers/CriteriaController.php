<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('criterias.index', [
            'criterias' => Criteria::all(),
            'title' => 'Criteria',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('criterias.create', [
            'title' => 'Create Criteria',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Criteria::create($request->all());
        return redirect()->route('criterias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Criteria $criteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Criteria $criteria)
    {
        return view('criterias.edit', [
            'criteria' => $criteria,
            'title' => 'Edit Criteria',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Criteria $criteria)
    {
        $criteria->update($request->all());
        return redirect()->route('criterias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criteria $criteria)
    {
        $criteria->delete();
        return redirect()->route('criterias.index');
    }
}
