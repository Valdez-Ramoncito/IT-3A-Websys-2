@extends('layouts.app')

@section('content')

<div class="mb-3">
    <a href="{{ route('students.index') }}" class="btn btn-outline-forest btn-sm">Back</a>
</div>

<div class="card p-4" style="max-width: 560px;">
    <div class="page-title mb-3">Edit Student</div>
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

    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Student Number</label>
            <input type="text" name="student_number" class="form-control" value="{{ $student->student_number }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Course</label>
            <input type="text" name="course" class="form-control" value="{{ $student->course }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Year Level</label>
            <select name="year_level" class="form-select">
                <option value="">Select Year Level</option>
                <option value="1st Year" {{ $student->year_level == '1st Year' ? 'selected' : '' }}>1st Year</option>
                <option value="2nd Year" {{ $student->year_level == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                <option value="3rd Year" {{ $student->year_level == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                <option value="4th Year" {{ $student->year_level == '4th Year' ? 'selected' : '' }}>4th Year</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $student->email }}">
        </div>
        <div class="mb-4">
            <label class="form-label">Photo</label>
            @if($student->picture)
                <div class="mb-2">
                    <img src="{{ Storage::url($student->picture) }}" style="height: 80px; border-radius: 2px; border: 1px solid var(--border);" alt="current photo">
                    <div style="font-size: 0.75rem; color: var(--muted); margin-top: 4px;">Current photo. Upload a new one to replace it.</div>
                </div>
            @endif
            <input type="file" name="picture" class="form-control" accept="image/*">
            <div style="font-size: 0.75rem; color: var(--muted); margin-top: 4px;">Max 2MB. JPG, PNG accepted.</div>
        </div>
        <button type="submit" class="btn btn-forest px-4">Update Student</button>
    </form>
</div>

@endsection