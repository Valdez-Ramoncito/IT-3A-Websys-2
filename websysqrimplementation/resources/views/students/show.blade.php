@extends('layouts.app')

@section('content')
<h2>Student Details</h2>

<div class="card" style="max-width: 500px;">
    <div class="card-body">
        <p><strong>Student Number:</strong> {{ $student->student_number }}</p>
        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Course:</strong> {{ $student->course }}</p>
        <p><strong>Year Level:</strong> {{ $student->year_level }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <hr>
        <p><strong>QR Code (contains all student data):</strong></p>
        {!! $qr !!}
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection