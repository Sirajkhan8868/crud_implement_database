@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Teacher Details</h2>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $teacher->first_name }} {{ $teacher->last_name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $teacher->email }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $teacher->address }}</p>
            <p class="card-text"><strong>Contact:</strong> {{ $teacher->contact }}</p>
            <p class="card-text"><strong>Hire Date:</strong> {{ $teacher->hire_date }}</p>
            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
