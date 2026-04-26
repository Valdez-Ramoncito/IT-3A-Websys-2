@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <span class="page-title">Students</span>
    <a href="{{ route('students.create') }}" class="btn btn-forest btn-sm px-3">+ Add Student</a>
</div>

@if(session('success'))
    <div class="alert alert-success py-2">{{ session('success') }}</div>
@endif

<form method="GET" action="{{ route('students.index') }}" class="mb-3">
    <div class="input-group" style="max-width: 420px;">
        <input type="text" name="search" class="form-control" placeholder="Search by name, student no., or course" value="{{ request('search') }}">
        <button class="btn btn-forest" type="submit">Search</button>
        @if(request('search'))
            <a href="{{ route('students.index') }}" class="btn btn-outline-forest">Clear</a>
        @endif
    </div>
</form>

<div class="card">
    <table class="table table-bordered mb-0">
        <thead>
            <tr>
                <th>Photo</th>
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
                <td>
                    @if($student->picture)
                        <img src="{{ Storage::url($student->picture) }}" class="student-thumb" alt="photo">
                    @else
                        <div class="no-photo">No Photo</div>
                    @endif
                </td>
                <td>{{ $student->student_number }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->course }}</td>
                <td>{{ $student->year_level }}</td>
                <td>{{ $student->email }}</td>
                <td>{!! $student->qr !!}</td>
                <td>
                    <div class="d-flex gap-1 flex-wrap">
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-outline-forest btn-sm">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-earth btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this student?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center py-4" style="color: var(--muted); font-size: 0.9rem;">No students found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection