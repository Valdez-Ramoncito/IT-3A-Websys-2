@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card mb-3">
            <div class="card-body p-3">
                <div class="text-center mb-3">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width:56px;height:56px;font-size:1.4rem;">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <div class="fw-semibold">{{ Session::get('user_name') }}</div>
                    <small class="text-muted">{{ $user->student_id }}</small>
                </div>
                <hr>
                <ul class="nav flex-column sidebar">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.settings') }}">
                            <i class="bi bi-gear"></i> Account Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card mb-3">
            <div class="card-header">Student Information</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless mb-0">
                            <tr>
                                <td class="text-muted" style="width:140px;">Full Name</td>
                                <td class="fw-semibold">{{ $user->first_name }} {{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Student ID</td>
                                <td>{{ $user->student_id }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Phone</td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Gender</td>
                                <td>{{ $user->gender }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless mb-0">
                            <tr>
                                <td class="text-muted" style="width:120px;">Course</td>
                                <td>{{ $user->course }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Year Level</td>
                                <td>Year {{ $user->year_level }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Birthdate</td>
                                <td>{{ \Carbon\Carbon::parse($user->birthdate)->format('M d, Y') }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Address</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Enrolled</td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Recent Activity</div>
            <div class="card-body p-0">
                @if($logs->isEmpty())
                    <p class="text-muted p-3 mb-0">No activity records found.</p>
                @else
                    <table class="table table-sm mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Action</th>
                                <th>Description</th>
                                <th>IP Address</th>
                                <th>Date & Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $log)
                            <tr>
                                <td>
                                    <span class="badge
                                        @if($log->action == 'login') bg-success
                                        @elseif($log->action == 'logout') bg-secondary
                                        @elseif($log->action == 'register') bg-primary
                                        @else bg-warning text-dark
                                        @endif">
                                        {{ $log->action }}
                                    </span>
                                </td>
                                <td>{{ $log->description }}</td>
                                <td>{{ $log->ip_address }}</td>
                                <td>{{ \Carbon\Carbon::parse($log->created_at)->format('M d, Y h:i A') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
