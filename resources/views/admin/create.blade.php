@extends('layouts.master')
@section('title', 'Create Admin')
@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Create Admin</h1>
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" autocomplete="name" autofocus required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email') }}" autocomplete="email" autofocus aria-describedby="emailHelp" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" autocomplete="new-password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-confirm"
                    name="password_confirmation" autocomplete="new-password" required>
            </div>
            <a href="{{ route('user.index') }}" class="btn btn-primary">kembali</a>
            <button type="submit" class="btn btn-success">tambahkan</button>
        </form>
    </div>
@endsection
