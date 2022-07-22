@extends('_layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="card border-0 p-4">
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="d-flex justify-content-between align-item-center  mb-3">
                <h5>Edit User</h5>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-plus"></i> Submit</button>
            </div>
            @csrf
            <div class="form-group mb-2">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name"
                    value="{{ old('name') ?? $user->name }}" placeholder="Nama">
                @error('name')
                    <small class="text-danger mt-1">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="NIM">NIM</label>
                <input type="text" name="NIM" class="form-control" id="NIM"
                    value="{{ old('NIM') ?? $user->NIM }}" placeholder="NIM">
                @error('NIM')
                    <small class="text-danger mt-1">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email"
                    value="{{ old('email') ?? $user->email }}" placeholder="Email">
                @error('email')
                    <small class="text-danger mt-1">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="jurusan">Jurusan</label>
                <select class="form-select" aria-label="Jurusan" id="jurusan" name="jurusan">
                    <option selected disabled>Pilih jurusan</option>
                    <option @selected(old('jurusan') ?? $user->jurusan == 'Teknologi Informasi') value="Teknologi Informasi">Teknologi Informasi</option>
                    <option @selected(old('jurusan') ?? $user->jurusan == 'Akuntansi') value="Akuntansi">Akuntansi</option>
                    <option @selected(old('jurusan') ?? $user->jurusan == 'Akuntansi Sektror Publik') value="Akuntansi Sektor Publik">Akuntansi Sektor Publik</option>
                    <option @selected(old('jurusan') ?? $user->jurusan == 'Mekatronika') value="Mekatronika">Mekatronika</option>
                    <option @selected(old('jurusan') ?? $user->jurusan == 'Elektronika') value="Elektronika">Elektronika</option>
                </select>
                @error('jurusan')
                    <small class="text-danger mt-1">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                @error('password')
                    <small class="text-danger mt-1">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                    placeholder="Password">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="is_admin" id="admin"
                    @checked(old('is_admin') ?? $user->is_admin)>
                <label class="form-check-label" for="admin">
                    Jadikan Admin
                </label>
            </div>
        </form>
    </div>

@endsection
