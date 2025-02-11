<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Guardian;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('guardian', 'studentClass')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $guardians = Guardian::all();
        $classes = StudentClass::all();
        return view('students.create', compact('guardians', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'enrollment_date' => 'required|date',
            'guardian_id' => 'required|exists:guardians,id',
            'student_class_id' => 'required|exists:student_classes,id',
        ]);

        $student = Student::create($request->all());

        return redirect()->route('students.show', $student->id)
            ->with('success', 'Student added successfully!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $guardians = Guardian::all();
        $classes = StudentClass::all();
        return view('students.edit', compact('student', 'guardians', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'enrollment_date' => 'required|date',
            'guardian_id' => 'required|exists:guardians,id',
            'student_class_id' => 'required|exists:student_classes,id',
        ]);

        $student->update($request->all());

        return redirect()->route('students.show', $student->id)
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
