@extends('layouts.master')
@section('title', 'KBBI Cari Peribahasa')
@section('content')
    <div class="container mb-5">
        <h1 class="text-center color-primary mt-5">Pencarian Peribahasa!</h1>
        <form class="mb-5 mt-5" action="{{ route('cariperibahasa') }}" method="get">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Peribahasa...." name="cariPeribahasa"
                    aria-label="Cari Peribahasa...." aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
            </div>
        </form>
        @forelse ($result as $peribhs)
            @forelse ($peribhs['proverbs'] as $value)
                <div class="card mb-3">
                    <div class="card-header">Peribahasa yang berkaitan dengan [{{ $value['phrase'] }}]</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $value['proverb'] }}</h5>
                        <p class="card-text">{{ $value['meaning'] }}</p>
                    </div>
                </div>
            @empty
                <div class="card mb-3">
                    <div class="card-header">data tidak ditemukan.</div>
                </div>
            @endforelse
        @empty
            <div class="card mb-3">
                <div class="card-header">data tidak ditemukan.</div>
            </div>
        @endforelse
    </div>


@endsection
