@extends('layouts.master')
@section('title', 'verify')
@section('content')
    <div class="container autentikasi">
        <h1 class="text-center text-white">Verify Your Email Address</h1>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        <span>Before proceeding, please check your email for a verification link.</span>
        <span>If you did not receive the email</span>
        <form class="d-flex flex-column " method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-light">click here to request another</button>
        </form>
    </div>
@endsection
