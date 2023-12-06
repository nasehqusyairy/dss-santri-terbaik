<?php

namespace App\Http\Controllers;

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

    public function assessment(Student $student)
    {
        $scale = [
            [
                'name' => 'Kurang',
                'value' => 1
            ],
            [
                'name' => 'Cukup',
                'value' => 2
            ],
            [
                'name' => 'Bagus',
                'value' => 3,
            ],
            [
                'name' => 'Sagat Bagus',
                'value' => 4,
            ],
            [
                'name' => 'Sempurna',
                'value' => 5,
            ],

        ];

        return view('students.assessment', [
            'student' => $student,
            'title' => "$student->name's Assessment",
            'scale' => $scale,
            'criterias' => Criteria::all(),
        ]);
    }
}
