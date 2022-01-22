@extends('layouts.master')
@section('title', 'Confirm Password')
@section('content')
    <div class="container autentikasi">
        <h1 class="text-center text-white">Confirm Password</h1>
        <span>Please confirm your password before continuing.</span>
        <form class="d-flex flex-column " method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-light">Confirm Password</button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            @endif
        </form>
    </div>
@endsection
