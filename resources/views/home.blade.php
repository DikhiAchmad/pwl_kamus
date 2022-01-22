@extends('layouts.master')
@section('title', 'KBBI | Pencarian Kata')
@section('content')
    <div class="container mb-5">
        <h1 class="text-center color-primary mt-5">Selamat Datang di KBBI!</h1>
        <p class="text-center mt-4">laman pencarian kata dalam Kamus Besar Bahasa Indonesia <br>silahkan untuk mencari kata
            yang diinginkan.</p>
        <form class="mb-5 mt-4" action="{{ route('carikata') }}" method="get">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Pencarian Kata...." aria-label="Pencarian Kata...."
                    name="carikata" aria-describedby="button-addon2" value="{{ request('carikata') }}">
                <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
@endsection
