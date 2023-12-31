<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Criteria;
use App\Models\Student;
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

    public function store(Request $request)
    {
        $criterias = Criteria::all();
        $student_id = $request->input('student_id');
        $criteria_ids = $request->input('criteria_id');
        $values = $request->input('values');

        // dd($values);

        foreach ($criteria_ids as $index => $criteria_id) {

            $score = $values[$index];
            Assessment::create([
                'student_id' => $student_id,
                'criteria_id' => $criteria_id,
                'score' => $score,
            ]);
        }
        session()->flash('message', 'Assessment successfully created.');
        return redirect('/students');
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
    public function destroy(Student $student)
    {
        Assessment::where('student_id', $student->id)->delete();
        session()->flash('message', 'Assessment successfully deleted.');
        return redirect('/values');
    }
    public function values()
    {
        return view('values', [
            'title' => 'Values',
            'students' => Student::all(),
            'criterias' => Criteria::all()
        ]);
    }
}
