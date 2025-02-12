@extends('layouts.app')

@section('content')
    <h1>Students List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr style="font-size: 12px">
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Enrollment Date</th>
                    <th>Guardian</th>
                    <th>Class</th>
                    <th>Attendance</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->date_of_birth }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->contact }}</td>
                        <td>{{ $student->enrollment_date }}</td>
                        <td>
                            {{ optional($student->guardian)->first_name ?? 'N/A' }}
                            {{ optional($student->guardian)->last_name ?? '' }}
                        </td>
                        <td>{{ optional($student->studentClass)->name ?? 'N/A' }}</td>

                        <td>
                            @if($student->attendances->count() > 0)
                                <ul style="list-style: none">
                                    @foreach ($student->attendances as $attendance)
                                        <li> {{ $attendance->date }} - {{ $attendance->status }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No attendance records</p>
                            @endif
                        </td>

                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm" style="margin-right: 5px;">
                                    View
                                </a>

                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm" style="margin-right: 5px;">
                                    Edit
                                </a>

                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
