@extends('layouts.app')

@section('content')
    <h1>Students List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Enrollment Date</th>
                <th>Guardian</th>
                <th>Class</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->date_of_birth }}</td> <!-- ✅ Date of Birth Fix -->
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->contact }}</td>
                    <td>{{ $student->enrollment_date }}</td>
                    <td>
                        {{ optional($student->guardian)->first_name ?? 'N/A' }}
                        {{ optional($student->guardian)->last_name ?? '' }}
                    </td>
                    <td>{{ optional($student->studentClass)->class_name ?? 'N/A' }}</td> <!-- ✅ Class Name Fix -->
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
