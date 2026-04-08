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
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('user.settings') }}">
                            <i class="bi bi-gear"></i> Account Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Account Settings</div>
            <div class="card-body p-4">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('user.settings.update') }}" method="POST">
                    @csrf

                    <p class="text-muted small mb-3">Personal Information</p>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}" required>
                            @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
                            @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Home Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}" required>
                        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <hr class="my-3">
                    <p class="text-muted small mb-3">Enrollment Information</p>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label class="form-label">Course / Program</label>
                            <input type="text" name="course" class="form-control" value="{{ old('course', $user->course) }}" required>
                            @error('course') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Year Level</label>
                            <select name="year_level" class="form-select" required>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ (old('year_level', $user->year_level) == $i) ? 'selected' : '' }}>Year {{ $i }}</option>
                                @endfor
                            </select>
                            @error('year_level') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <hr class="my-3">
                    <p class="text-muted small mb-3">Change Password <span class="text-secondary fw-normal">(leave blank to keep current password)</span></p>

                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control">
                        @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control">
                            @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" class="form-control">
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
