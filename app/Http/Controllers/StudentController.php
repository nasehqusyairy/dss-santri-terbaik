<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Criteria;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index', [
            'students' => Student::all(),
            'criterias' => Criteria::all(),
            'title' => 'Students'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create', [
            'title' => 'Add Student',
            'groups' => Group::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Student::create($request->all());
        return redirect('/students');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student,
            'groups' => Group::all(),
            'title' => 'Edit Student'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/students');
    }

    public function assessment(Student $student, Criteria $criteria)
    {
        $scale = [
            [
                'name' => 'Tidak Pernah',
                'description' => 'tidak pernah melakukan',
                'value' => 0
            ],
            [
                'name' => 'Jarang',
                'description' => 'tidak berkomitmen dan pernah melakukan, namun jarang menemui (studi kasus atau sub kriteria)',
                'value' => 25
            ],
            [
                'name' => 'Kadang-Kadang',
                'value' => 50,
                'description' => 'tidak berkomitmen dan tidak selalu melakukan walaupun sering',
            ],
            [
                'name' => 'Sering',
                'value' => 75,
                'description' => 'tidak berkomitmen, tapi selalu melakukan',
            ],
            [
                'name' => 'Selalu',
                'value' => 100,
                'description' => 'berkomitmen dan selalu melakukan',
            ],

        ];

        return view('students.assessment', [
            'student' => $student,
            'criteria' => $criteria,
            'title' => "$student->name's $criteria->name Assessment",
            'scale' => $scale,
            'score' => $student->assessments()->where('criteria_id', $criteria->id)->first()->score ?? 0
        ]);
    }
}
