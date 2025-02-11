@extends('layouts.app')

@section('content')
    <h1>Add New Student</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="enrollment_date">Enrollment Date</label>
            <input type="date" name="enrollment_date" id="enrollment_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="guardian_id">Guardian</label>
            <select name="guardian_id" id="guardian_id" class="form-control" required>
                <option value="">Select Option</option>
                @foreach ($guardians as $guardian)
                    <option value="{{ $guardian->id }}">{{ $guardian->first_name }} {{ $guardian->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="student_class_id">Class</label>
            <select name="student_class_id" id="student_class_id" class="form-control" required>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit form</button>
    </form>
@endsection
