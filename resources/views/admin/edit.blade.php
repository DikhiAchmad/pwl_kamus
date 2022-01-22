@extends('layouts.master')
@section('title', 'Update Admin')
@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Update Admin</h1>
        <form method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ $user->name }}" autocomplete="name" autofocus required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ $user->email }}" autocomplete="email" autofocus aria-describedby="emailHelp" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" autocomplete="new-password" value="{{ $user->password }}">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-confirm"
                    name="password_confirmation" autocomplete="new-password">
            </div>
            <a href="{{ route('user.index') }}" class="btn btn-primary">kembali</a>
            <button type="submit" class="btn btn-success">update data</button>
        </form>
    </div>
@endsection
