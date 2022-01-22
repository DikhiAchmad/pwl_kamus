@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="card mb-3">
            <div class="card-header">Lema: [{{ $lema->lema }}]</div>
            <div class="card-body">
                <h5 class="card-title">Tipe Kata: <br>[{{ $lema->type }}] [{{ $lema->kelas }}]</h5>
                <p class="card-text">
                    Penjelasan: <br>{{ $lema->nilai }}
                </p>
                <p class="card-text">
                    dibuat tanggal: <br>
                    {{ $lema->created_at }}
                </p>
                <p class="card-text">
                    diedit tanggal: <br>
                    {{ $lema->updated_at }}
                </p>
                <a class="btn btn-primary text-center" href="{{ route('admin.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection
