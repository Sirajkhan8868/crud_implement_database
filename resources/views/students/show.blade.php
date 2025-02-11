@extends('layouts.app')

@section('content')
    <h1>Student Details</h1>

    <p><strong>Name:</strong> {{ $student->first_name }} {{ $student->last_name }}</p>
    <p><strong>Date of Birth:</strong> {{ $student->date_of_birth }}</p>
    <p><strong>Gender:</strong> {{ $student->gender }}</p>
    <p><strong>Contact:</strong> {{ $student->contact }}</p>
    <p><strong>Address:</strong> {{ $student->address }}</p>
    <p><strong>Enrollment Date:</strong> {{ $student->enrollment_date }}</p>
    <p><strong>Guardian:</strong> {{ $student->guardian->first_name }} {{ $student->guardian->last_name }}</p>
    <p><strong>Class:</strong> {{ $student->studentClass->name }}</p>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Student List</a>
@endsection
