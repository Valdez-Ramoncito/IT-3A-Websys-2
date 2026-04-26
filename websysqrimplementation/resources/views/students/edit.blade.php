@extends('layouts.app')

@section('content')
<h2>Edit Student</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Student Number</label>
        <input type="text" name="student_number" class="form-control" value="{{ $student->student_number }}">
    </div>
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $student->name }}">
    </div>
    <div class="mb-3">
        <label>Course</label>
        <input type="text" name="course" class="form-control" value="{{ $student->course }}">
    </div>
    <div class="mb-3">
        <label>Year Level</label>
        <select name="year_level" class="form-select">
            <option value="">Select Year Level</option>
            <option value="1st Year" {{ $student->year_level == '1st Year' ? 'selected' : '' }}>1st Year</option>
            <option value="2nd Year" {{ $student->year_level == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
            <option value="3rd Year" {{ $student->year_level == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
            <option value="4th Year" {{ $student->year_level == '4th Year' ? 'selected' : '' }}>4th Year</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $student->email }}">
    </div>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection