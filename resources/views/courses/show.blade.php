@extends('layouts.app')

@section('content')
    <h2>{{ $course->course_name }}</h2>
    <p><strong>Teacher:</strong> {{ $course->teacher->name }}</p>
    <p><strong>Description:</strong> {{ $course->description }}</p>

    <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
