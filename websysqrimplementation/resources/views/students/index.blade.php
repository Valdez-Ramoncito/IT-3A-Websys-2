@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Students</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="GET" action="{{ route('students.index') }}" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search by name, student number, or course" value="{{ request('search') }}">
        <button class="btn btn-secondary" type="submit">Search</button>
        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Clear</a>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Student No.</th>
            <th>Name</th>
            <th>Course</th>
            <th>Year Level</th>
            <th>Email</th>
            <th>QR Code</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($students as $student)
        <tr>
            <td>{{ $student->student_number }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->course }}</td>
            <td>{{ $student->year_level }}</td>
            <td>{{ $student->email }}</td>
            <td>{!! $student->qr !!}</td>
            <td>
                <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No students found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection