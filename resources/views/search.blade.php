@extends('_layouts.app')

@section('title', 'Beranda')

@section('content')
    <form style="width: 100%;" class="mx-auto" id="searchForm">
        <label for="cari" class="form-label">Cari Arsip Tugas Akhir</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control form-control-lg" name="q" id="cari"
                placeholder="Masukan keywords..." value="{{ request('q') }}">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-fw fa-search"></i></button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" onclick="searchFilter('all')">Cari untuk <strong>semua</strong> jurusan</a>
                </li>
                <li><a class="dropdown-item" onclick="searchFilter('Teknologi Informasi')">Cari dengan jurusan
                        <strong>Teknologi
                            Informasi</strong></a>
                </li>
                <li><a class="dropdown-item" onclick="searchFilter('Akuntansi')">Cari dengan jurusan
                        <strong>Akuntansi</strong></a></li>
                <li><a class="dropdown-item" onclick="searchFilter('Akuntansi Sektor Publik')">Cari dengan jurusan
                        <strong>Akuntansi Sektor
                            Publik</strong></a>
                </li>
                <li><a class="dropdown-item" onclick="searchFilter('Mekatronika')">Cari dengan jurusan
                        <strong>Mekatronika</strong></a></li>
                <li><a class="dropdown-item" onclick="searchFilter('Elektronika')">Cari dengan jurusan
                        <strong>Elektronika</strong></a></li>
            </ul>
        </div>
    </form>
    <script>
        function searchFilter(filter) {
            if (document.getElementById('searchForm').q.value !== '') {
                let inputFilter = document.createElement('input');
                inputFilter.setAttribute('type', 'hidden');
                inputFilter.setAttribute('name', 'filter');
                inputFilter.setAttribute('value', filter);
                document.getElementById('searchForm').appendChild(inputFilter);
                document.getElementById('searchForm').submit();
            }
        }
    </script>
    @if (request('filter'))
        <small>Filter pencarian dengan jurusan : <strong>{{ request('filter') }}</strong></small>
    @endif
    <hr>
    <div class="row">
        @if ($tugasAkhir->count() > 0)
            @foreach ($tugasAkhir as $item)
                <div class="col-md-3 col-6 p-2">
                    <div class="card position-relative">
                        <div class="badge bg-secondary position-absolute" style="top: 10px; left: 10px">
                            {{ $item->user->jurusan }}</div>
                        <img src="{{ asset('images/cover/' . $item->cover) }}" class="card-img-top" alt="cover">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5><br>
                            <small class="card-text">{{ $item->user->name }}</small><br>
                            <small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-warning">
                    <h5 class="alert-heading mb-2">Tidak ditemukan</h5>
                    <p>Tidak ditemukan arsip tugas akhir yang sesuai dengan kriteria pencarian Anda.</p>
                </div>
            </div>
        @endif
    </div>
    {{-- {{ $tugasAkhir->links() }} --}}
@endsection
