<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

class SubCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('subcriterias.index', [
            'subcriterias' => SubCriteria::all(),
            'title' => 'Sub Criteria',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subcriterias.create', [
            'title' => 'Create Sub Criteria',
            'criterias' => Criteria::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SubCriteria::create($request->all());
        return redirect()->route('subcriterias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCriteria $subCriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCriteria $subcriteria)
    {
        return view('subcriterias.edit', [
            'subcriteria' => $subcriteria,
            'title' => 'Edit Sub Criteria',
            'criterias' => Criteria::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCriteria $subCriteria)
    {
        $subCriteria->update($request->all());
        return redirect()->route('subcriterias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCriteria $subCriteria)
    {
        $subCriteria->delete();
        return redirect()->route('subcriterias.index');
    }
}
