@extends('layouts.app')

@section('content')

<div class="mb-3 d-flex gap-2">
    <a href="{{ route('students.index') }}" class="btn btn-outline-forest btn-sm">Back</a>
    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-earth btn-sm">Edit</a>
</div>

<div class="card p-4" style="max-width: 640px;">
    <div class="page-title mb-3">{{ $student->name }}</div>
    <hr class="section-line mt-0">

    <div class="row g-4">
        <div class="col-auto">
            @if($student->picture)
                <img src="{{ Storage::url($student->picture) }}"
                     style="width: 140px; height: 160px; object-fit: cover; border-radius: 2px; border: 1px solid var(--border);"
                     alt="photo">
            @else
                <div style="width: 140px; height: 160px; background-color: var(--primary-light); border: 1px solid var(--border); border-radius: 2px; display: flex; align-items: center; justify-content: center; font-size: 0.78rem; color: var(--muted);">
                    No Photo
                </div>
            @endif
        </div>

        <div class="col">
            <div class="mb-3">
                <div class="detail-label">Student Number</div>
                <div class="detail-value">{{ $student->student_number }}</div>
            </div>
            <div class="mb-3">
                <div class="detail-label">Course</div>
                <div class="detail-value">{{ $student->course }}</div>
            </div>
            <div class="mb-3">
                <div class="detail-label">Year Level</div>
                <div class="detail-value">{{ $student->year_level }}</div>
            </div>
            <div class="mb-3">
                <div class="detail-label">Email</div>
                <div class="detail-value">{{ $student->email }}</div>
            </div>
        </div>
    </div>

    <hr class="section-line">

    <div class="detail-label mb-2">QR Code</div>
    <div style="display: inline-block; padding: 12px; border: 1px solid var(--border); border-radius: 2px; background: #fff;">
        {!! $qr !!}
    </div>
    <div style="font-size: 0.75rem; color: var(--muted); margin-top: 6px;">Scan to view encoded student data.</div>
</div>

@endsection