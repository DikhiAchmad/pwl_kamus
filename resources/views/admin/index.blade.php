@extends('layouts.master')
@section('title', 'data admin')
@section('content')
    <div class="container mb-5">
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
        <div class="row align-items-center justify-content-evenly mt-5">
            <div class="col-md-4 col-12">
                <h4>Kelola Admin</h4>
            </div>
            <div class="col-md-4 col-12">
                <form action="{{ route('user.index') }}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="cari admin...." aria-label="cari admin...."
                            name="cariadmin" aria-describedby="button-addon2" value="{{ request('cariadmin') }}">
                        <button class="btn btn-primary" type="submit" id="button-addon2"><i
                                class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-12 text-end">
                <a href="{{ route('user.create') }}" class="btn btn-primary">tambah User</a>
            </div>
        </div>
        <div class="table mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">dibuat tanggal</th>
                        <th scope="col">terakhir diupdate</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datauser as $user)
                        <tr>
                            <th scope="row">{{ ++$no }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ date_format($user->created_at, 'd-m-Y H:i:s') }}</td>
                            <td>{{ date_format($user->updated_at, 'd-m-Y H:i:s') }}</td>
                            <td class="d-flex">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning mx-2"><i
                                        class="fa-solid fa-pen"></i></a>
                                <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                        class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
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
        {{ $datauser->links('vendor.pagination.custom') }}
    </div>
@endsection
