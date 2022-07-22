@extends('_layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="card border-0 p-4">
        <table class="table">
            <tr>
                <th class="py-3 px-0" scope="row">Nama</th>
                <td class="py-3 px-0 fw-bold">{{ auth()->user()->name }}</td>
            </tr>
            <tr>
                <th class="py-3 px-0" scope="row">NIM</th>
                <td class="py-3 px-0 fst-italic fw-light">{{ auth()->user()->NIM }}</td>
            </tr>
            <tr>
                <th class="py-3 px-0" scope="row">Email</th>
                <td class="py-3 px-0">{{ auth()->user()->email }}</td>
            </tr>
            <tr>
                <th class="py-3 px-0" scope="row">Jurusan</th>
                <td class="py-3 px-0">{{ auth()->user()->jurusan }}</td>
            </tr>
        </table>
        {{-- create button to change password --}}
        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary btn-sm mt-2"
            style="width: fit-content"><i class="fas fa-fw fa-lock"></i> Ubah Password</a>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ubah Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/profile/change-password" method="POST" id="form-ubah-password">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password Baru">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Konfirmasi Password Baru">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('form-ubah-password').submit()">Ubah</button>
                </div>
            </div>
        </div>
    </div>

@endsection
