@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Add New Teacher</h2>
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

    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Hire Date</label>
            <input type="date" name="hire_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Teacher</button>
    </form>
</div>
@endsection
