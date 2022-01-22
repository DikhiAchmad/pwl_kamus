@extends('layouts.master')
@section('title', 'Create Admin')
@section('content')
    <div class="container">
        <h1 class="text-center mt-5">Create Kata</h1>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">mohon untuk dibenarkan!</h4>
                <hr>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            <div class="mb-3">
                <label for="lema" class="form-label">lema</label>
                <input type="text" class="form-control @error('lema') is-invalid @enderror" id="lema" name="lema"
                    value="{{ old('lema') }}" autocomplete="lema" autofocus required>
                @error('lema')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="nilai" name="nilai"
                    value="{{ old('nilai') }}" autocomplete="nilai" autofocus required>
                @error('nilai')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">kelas</label>
                <select class="form-select" aria-label="Default select example" name="kelas">
                    <option value="" selected>pilih kelas kata</option>
                    @foreach ($selectKelas as $kelas)
                        <option value="{{ $kelas->kelas }}">{{ $kelas->kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">type</label>
                <select class="form-select" aria-label="Default select example" name="type">
                    <option value="" selected>pilih type kelas kata</option>
                    @foreach ($selectType as $type)
                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                    @endforeach
                </select>
            </div>
            <a href="{{ route('admin.index') }}" class="btn btn-primary">kembali</a>
            <button type="submit" class="btn btn-success">tambahkan</button>
        </form>
    </div>
@endsection
