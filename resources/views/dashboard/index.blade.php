@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="container mb-5">
        <div class="row mt-5 mb-5">
            <div class="col-md-6">
                <div class="custom-card">
                    <span>
                        <i class="fa-brands fa-wordpress-simple"></i>
                    </span>
                    <div class="body-card">
                        <h1 class="card-title">Total Kata</h1>
                        <p class="card-desc">{{ $totalKata }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-card">
                    <span>
                        <i class="fa-solid fa-users"></i>
                    </span>
                    <div class="body-card">
                        <h1 class="card-title">Total Admin</h1>
                        <p class="card-desc">{{ $totalUser }}</p>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('updated'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('updated') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::has('deleted'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('deleted') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row align-items-center justify-content-evenly mt-4">
            <div class="col-md-4 col-12">
                <h4>Kelola Kata</h4>
            </div>
            <div class="col-md-4 col-12">
                <form action="{{ route('admin.index') }}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pencarian Kata...."
                            aria-label="Pencarian Kata...." name="caridata" aria-describedby="button-addon2"
                            value="{{ request('caridata') }}">
                        <button class="btn btn-primary" type="submit" id="button-addon2"><i
                                class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-12 text-end">
                <a href="{{ route('admin.create') }}" class="btn btn-primary">tambah Kata</a>
            </div>
        </div>
        <div class="table table-responsive-md mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">lema</th>
                        <th scope="col">nilai</th>
                        <th scope="col">kelas</th>
                        <th scope="col">tipe kata</th>
                        <th scope="col">dibuat tanggal</th>
                        <th scope="col">terakhir diupdate</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataKata as $kata)
                        <tr>
                            <td>{{ $kata->lema }}</td>
                            <td class="w-25">{{ $kata->nilai }}</td>
                            <td>{{ $kata->kelas }}</td>
                            <td>{{ $kata->type }}</td>
                            <td>{{ date_format($kata->created_at, 'd-m-Y H:i:s') }}</td>
                            <td>{{ date_format($kata->updated_at, 'd-m-Y H:i:s') }}</td>
                            <td class="w-15 d-flex">
                                <a href="{{ route('admin.edit', $kata->id) }}" class="btn btn-warning mx-1"><i
                                        class="fa-solid fa-pen"></i></a>
                                <form method="POST" action="{{ route('admin.destroy', $kata->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                        class="btn btn-danger mx-1"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th scope="row">Tidak ada data ditemukan.</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $dataKata->links('vendor.pagination.custom') }}
    </div>
@endsection
