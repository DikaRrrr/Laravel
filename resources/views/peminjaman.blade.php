@extends('layouts.main')


@section('container')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

   <section>
    <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">{{ $book->judul }}</h2>
          @foreach ($book->categories as $category)
          <p class="card-text"><small class="text-body-secondary">{{ $category->namakategori }}</small></p>
          @endforeach
        </div>
        <div class="card-body">
            <p>Penulis : {{ $book->penulis }}</p>
            <p>Penerbit : {{ $book->penerbit }}</p>
            <p>Tahun Terbit : {{ $book->tahunterbit }}</p>
            <div class="card-footer">
                <form action="{{ url('pinjam_buku', $book->id) }}" method="POST">
                    @csrf
                <input type="submit" class="btn btn-primary form-control" value="Pinjam Buku" onclick="return confirm('Apakah Anda Ingin Meminjam Buku Ini?')">
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
   </section>

   <section style="margin-top: 3rem">
    <h3>Komentar</h3>
    <div class="add_comment">
        <div class="row">
            <div class="col">
                <form action="{{ url('add_comment', $book->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rating</span>
                        <input type="number" name="rating" min="1" max="10" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.0</span>
                      </div>
                    <div class="input-group">
                        <span class="input-group-text">Tambahkan Ulasan</span>
                        <input type="text" name="ulasan" class="form-control">
                      </div>
                      <input type="submit" class="btn btn-primary mt-3" value="Posting Ulasan">
                </form>

                <div class="row mt-5">
                    <div class="col">
                        @foreach ($ulasan as $ulasan)
                        <div class="card mb-3">
                            <div class="card-body">
                                <form action="{{ url('delete_comment', $ulasan->id) }}" method="POST">
                                    @csrf
                              <h5 class="card-title">{{ $ulasan->user->username }}
                                <input type="submit" style="border: none; background:none; margin-left:25px; font-size:14px" value="Hapus"> 
                            </h5>
                                </form>
                              <h6 class="card-subtitle mb-2 text-body-secondary"><small>{{ $ulasan->rating }}.0</small></h6>
                              <p class="card-text">{{ $ulasan->ulasan }}</p>
                            </div>
                          </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
   </section>
@endsection