@extends('layouts.master')
@section('title', 'KBBI | Pencarian Kata')
@section('content')
    <div class="container mb-5">
        <h1 class="text-center color-primary mt-5">Pencarian Kata!</h1>
        <form class="mb-5 mt-5" action="{{ route('carikata') }}" method="get">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Pencarian Kata...." aria-label="Pencarian Kata...."
                    name="carikata" aria-describedby="button-addon2" value="{{ request('carikata') }}">
                <select class="form-select" aria-label="Default select example" name="type">
                    <option value="" selected>pilih type kelas kata</option>
                    @foreach ($selectType as $type)
                        <option value="{{ $type->type }}" {{ $type->type == request('type') ? 'selected' : '' }}>
                            {{ $type->type }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
            </div>
        </form>

        @forelse ($kata as $lema)
            <div class="card mb-3">
                <div class="card-header">[{{ $lema->lema }}]</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $lema->type }}({{ $lema->kelas }})</h5>
                    <p class="card-text">{{ $lema->nilai }}</p>
                </div>
            </div>
        @empty
            <div class="card mb-3">
                <div class="card-header">data tidak ditemukan.</div>
            </div>
        @endforelse
        {{ $kata->links('vendor.pagination.custom') }}
    </div>
@endsection
