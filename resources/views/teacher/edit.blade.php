@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Edit Teacher</h2>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" value="{{ $teacher->first_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" value="{{ $teacher->last_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ $teacher->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" required>{{ $teacher->address }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="text" name="contact" value="{{ $teacher->contact }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Hire Date</label>
            <input type="date" name="hire_date" value="{{ $teacher->hire_date }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Teacher</button>
    </form>
</div>
@endsection
