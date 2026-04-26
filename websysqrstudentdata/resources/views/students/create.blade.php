@extends('layouts.app')

@section('content')

<div class="mb-3">
    <a href="{{ route('students.index') }}" class="btn btn-outline-forest btn-sm">Back</a>
</div>

<div class="card p-4" style="max-width: 560px;">
    <div class="page-title mb-3">Add Student</div>
    <hr class="section-line mt-0">

    @if($errors->any())
        <div class="alert alert-danger py-2">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Student Number</label>
            <input type="text" name="student_number" class="form-control" value="{{ old('student_number') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Course</label>
            <input type="text" name="course" class="form-control" value="{{ old('course') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Year Level</label>
            <select name="year_level" class="form-select">
                <option value="">Select Year Level</option>
                <option value="1st Year" {{ old('year_level') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                <option value="2nd Year" {{ old('year_level') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                <option value="3rd Year" {{ old('year_level') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                <option value="4th Year" {{ old('year_level') == '4th Year' ? 'selected' : '' }}>4th Year</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-4">
            <label class="form-label">Photo</label>
            <input type="file" name="picture" class="form-control" accept="image/*">
            <div style="font-size: 0.75rem; color: var(--muted); margin-top: 4px;">Max 2MB. JPG, PNG accepted.</div>
        </div>
        <button type="submit" class="btn btn-forest px-4">Save Student</button>
    </form>
</div>

@endsection