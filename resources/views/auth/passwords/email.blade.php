@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <div class="container autentikasi">
        <h1 class="text-center text-white">Reset Password</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form class="d-flex flex-column " method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email') }}" autocomplete="email" autofocus aria-describedby="emailHelp" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-light">Send Password Reset Link</button>
        </form>
    </div>
@endsection
