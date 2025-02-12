<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Guardian;
use App\Models\StudentClass;
use App\Models\Attendance;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('guardian', 'studentClass', 'attendances')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $guardians = Guardian::all();
        $classes = StudentClass::all();
        $attendances = Attendance::all();

        return view('students.create', compact('guardians', 'classes', 'attendances'));
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
            'attendance_id' => 'nullable|exists:attendances,id',
        ]);

        $student = Student::create($request->all());

        if ($request->has('attendance_id')) {
            $attendance = Attendance::find($request->attendance_id);
            $attendance->student_id = $student->id;
            $attendance->save();
        }

        return redirect()->route('students.show', $student->id)
            ->with('success', 'Student added successfully!');
    }

    public function show(Student $student)
    {
        $student->load('attendances', 'attendances.studentClass');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $guardians = Guardian::all();
        $classes = StudentClass::all();
        $attendances = Attendance::all();

        return view('students.edit', compact('student', 'guardians', 'classes', 'attendances'));
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
            'attendance_id' => 'nullable|exists:attendances,id',
        ]);

        $student->update($request->all());

        if ($request->has('attendance_id')) {
            $attendance = Attendance::find($request->attendance_id);
            $attendance->student_id = $student->id;
            $attendance->save();
        }

        return redirect()->route('students.show', $student->id)
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
