@extends('layouts.app')

@section('content')
    <h1>Student Details</h1>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td>{{ $student->date_of_birth }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $student->gender }}</td>
            </tr>
            <tr>
                <th>Contact</th>
                <td>{{ $student->contact }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $student->address }}</td>
            </tr>
            <tr>
                <th>Enrollment Date</th>
                <td>{{ $student->enrollment_date }}</td>
            </tr>
            <tr>
                <th>Guardian</th>
                <td>{{ $student->guardian->first_name }} {{ $student->guardian->last_name }}</td>
            </tr>
            <tr>
                <th>Class</th>
                <td>{{ $student->studentClass->name }}</td>
            </tr>

            <tr>
                <th>Attendance</th>
                <td>
                    @if($student->attendances->count() > 0)
                        <ul>
                            @foreach ($student->attendances as $attendance)
                                <li style="list-style: none">
                                    {{ $attendance->date }} -  {{ $attendance->status }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        No attendance records available.
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Student List</a>
@endsection
