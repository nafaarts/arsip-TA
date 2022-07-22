@extends('_layouts.app')

@section('title', 'Arsip Tugas Akhir')

@section('content')
    <div class="card border-0 p-4">
        <div class="d-flex justify-content-between align-item-center  mb-3">
            <h5>Arsip Tugas Akhir</h5>
            <a href="/arsip/create" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Tugas Akhir</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- input cari --}}
        <form class="input-group mb-3">
            <input type="text" name="a" class="form-control form-control-sm" placeholder="Cari.."
                value="{{ request('a') }}">
            <button class="btn btn-sm btn-outline-secondary" type="button"><i class="fas fw-fa fa-search"></i></button>
        </form>
        <div class="overflow-auto">
            <table class="table table-sm table-responsive">
                <thead class="fw-bold">
                    <tr>
                        <th scope="col">#</th>
                        <td>Status</td>
                        <td>Judul</td>
                        <td>Jurusan</td>
                        <td>Mahasiswa</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tugasAkhir as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($item->status)
                                    <span class="badge bg-success">dipublish</span>
                                @else
                                    <span class="badge bg-warning">draft</span>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $item->judul }}</td>
                            <td>{{ $item->user->jurusan }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <a href="/arsip/{{ $item->id }}/edit" class="text-warning me-2"><i
                                        class="fas fa-fw fa-edit"></i></a>
                                <form action="/arsip/{{ $item->id }}" method="POST" class="d-inline"
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
        {{ $tugasAkhir->links() }}
    </div>
@endsection
