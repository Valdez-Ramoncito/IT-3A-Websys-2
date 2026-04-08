@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mt-2">
            <div class="card-header">
                Student Registration
            </div>
            <div class="card-body p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf

                    <p class="text-muted small mb-3">Personal Information</p>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                            @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                            @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select" required>
                                <option value="">Select gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate') }}" required>
                            @error('birthdate') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Home Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
                        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <hr class="my-3">
                    <p class="text-muted small mb-3">Enrollment Information</p>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Student ID</label>
                            <input type="text" name="student_id" class="form-control" value="{{ old('student_id') }}" required>
                            @error('student_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Course / Program</label>
                            <input type="text" name="course" class="form-control" value="{{ old('course') }}" required>
                            @error('course') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Year Level</label>
                            <select name="year_level" class="form-select" required>
                                <option value="">Year</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('year_level') == $i ? 'selected' : '' }}>Year {{ $i }}</option>
                                @endfor
                            </select>
                            @error('year_level') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <hr class="my-3">
                    <p class="text-muted small mb-3">Account Credentials</p>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-2">Create Account</button>
                </form>

                <div class="text-center mt-3">
                    <small class="text-muted">Already have an account? <a href="{{ route('login') }}">Sign in</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
