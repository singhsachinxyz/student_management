<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Student::with('teacher')
            ->when($search, function($query) use ($search) {
                return $query->where('student_name', 'like', "%$search%")
                             ->orWhere('class', 'like', "%$search%");
            })
            ->paginate(10);

        return view('students.index', compact('students', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('students.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'class_teacher_id' => 'required|exists:teachers,id',
            'class' => 'required|string|max:50',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric|min:0',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        return view('students.edit', compact('student', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'class_teacher_id' => 'required|exists:teachers,id',
            'class' => 'required|string|max:50',
            'admission_date' => 'required|date',
            'yearly_fees' => 'required|numeric|min:0',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
