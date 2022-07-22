@extends('_layouts.app')

@section('title', 'Beranda')

@section('content')
    {{-- <h5>Dashboard</h5>
    <hr> --}}
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh">
        <form action="search" class="d-flex justify-content-center flex-column">
            <div style="width: 100%;" class="mx-auto">
                <h3 class="text-center mb-4">Cari Arsip Tugas Akhir</h3>
                <div class="input-group mb-3">
                    <input type="text" name="q" class="form-control form-control-lg" id="cari"
                        placeholder="Cari disini...">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-fw fa-search"></i></button>
                </div>
            </div>
            <div class="d-flex mx-auto flex-wrap justify-content-center mt-3" style="gap: 10px">
                <label class="badge text-dark" style="background: rgba(97, 207, 0, 0.8);" for="semua">
                    <input type="radio" name="filter" id="semua" value="all" checked>
                    Semua
                </label>
                <label class="badge text-dark" style="background: rgba(85, 85, 255, 0.8)" for="ti">
                    <input type="radio" name="filter" id="ti" value="Teknologi Informasi">
                    Teknologi Informasi
                </label>
                <label class="badge text-dark" style="background: rgb(255, 230, 0, 0.8);" for="ak">
                    <input type="radio" name="filter" id="ak" value="Akuntansi">
                    Akuntansi
                </label>
                <label class="badge text-dark" style="background: rgb(255, 208, 0, 0.8);" for="asp">
                    <input type="radio" name="filter" id="asp" value="Akuntansi Sektor Publik">
                    Akuntansi Sektor Publik
                </label>
                <label class="badge text-dark" style="background: rgb(255, 162, 0, 0.8)" for="meka">
                    <input type="radio" name="filter" id="meka" value="Mekatronika">
                    Mekatronika
                </label>
                <label class="badge text-dark" style="background: rgba(254, 75, 75, 0.8)" for="elektro">
                    <input type="radio" name="filter" id="elektro" value="Elektronika">
                    Elektronika
                </label>
            </div>
        </form>
    </div>
@endsection
