@extends('layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <h2>Koleksi</h2>

    <div class="row mt-4">
    @foreach ($peminjaman as $peminjaman)
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="card border-info mb-3 h-100" style="max-width: 18rem;">
            <div class="card-header"><h4 class="card-title">{{ $peminjaman->buku->judul }}</h4>
                <p class="card-text">
                    
                    <p class="card-text"><small class="text-body-secondary"></small></p>
                    
                </p>
            </div>
            <div class="card-body">
              <p class="card-text">Penulis : {{ $peminjaman->Buku->penulis }}</p>
              <p class="card-text">Penerbit : {{ $peminjaman->Buku->penerbit }}</p>
              <p class="card-text">Tahun Terbit : {{ $peminjaman->Buku->tahunterbit }}</p>
            </div>
          </div>
    </div>
    @endforeach
@endsection