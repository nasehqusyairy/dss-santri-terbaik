<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student_id = $request->input('student_id');
        $criteria_id = $request->input('criteria_id');
        $values = $request->input('values');

        $value = array_sum($values) / count($values);

        $assessment = Assessment::where('student_id', $student_id)
            ->where('criteria_id', $criteria_id)
            ->first();

        if ($assessment) {
            $assessment->score = $value;
            $assessment->save();
        } else {
            Assessment::create([
                'student_id' => $student_id,
                'criteria_id' => $criteria_id,
                'score' => $value,
            ]);
        }
        session()->flash('message', 'Assessment created successfully!');
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assessment $assessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assessment $assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assessment $assessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assessment $assessment)
    {
        //
    }
}
