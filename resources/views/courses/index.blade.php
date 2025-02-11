@extends('layouts.app')

@section('content')
    <h2>Courses</h2>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Add New Course</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Teacher</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->teacher->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-info">View</a>
                        <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
