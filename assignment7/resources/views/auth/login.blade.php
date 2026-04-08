@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card mt-4">
            <div class="card-body p-4">
                <h4 class="mb-1 fw-bold">Welcome Back</h4>
                <p class="text-muted small mb-4">Sign in to your student account</p>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                </form>

                <div class="text-center mt-3">
                    <small class="text-muted">Don't have an account? <a href="{{ route('register') }}">Register here</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
