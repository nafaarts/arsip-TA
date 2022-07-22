@extends('_layouts.app')

@section('title', 'Users')

@section('content')
    <div class="card border-0 p-4">
        <div class="d-flex justify-content-between align-item-center  mb-3">
            <h5>Data Users</h5>
            <a href="/users/create" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah User</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- input cari --}}
        <form class="input-group mb-3">
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari.."
                value="{{ request('search') }}">
            <button class="btn btn-sm btn-outline-secondary" type="button"><i class="fas fw-fa fa-search"></i></button>
        </form>
        <div class="overflow-auto">
            <table class="table table-sm table-responsive">
                <thead class="fw-bold">
                    <tr>
                        <th scope="col">#</th>
                        <td>Nama</td>
                        <td>NIM</td>
                        <td>Email</td>
                        <td>Jurusan</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="fw-bold">{{ $user->name }}</td>
                            <td>{{ $user->NIM }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->jurusan }}</td>
                            <td>
                                <a href="/users/{{ $user->id }}/edit" class="text-warning me-2"><i
                                        class="fas fa-fw fa-edit"></i></a>
                                <form action="/users/{{ $user->id }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('anda yakin dihapus?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="p-0 bg-white border-0 text-danger"><i
                                            class="fas fw-fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    </div>
@endsection
