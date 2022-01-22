@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <div class="container autentikasi">
        <h1 class="text-center text-white">Login</h1>
        <form class="d-flex flex-column " method="POST" action="{{ route('login') }}">
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
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input " id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label text-white" for="remember">Check me out</label>
            </div>
            <button type="submit" class="btn btn-light">Login</button>
            <span class="text-center text-white mt-4">Lupa Password ? <a href="{{ route('password.request') }}"
                    class="text-custom">klik disini</a></span>
        </form>
    </div>
@endsection
