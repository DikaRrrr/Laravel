@extends('layouts.main')


@section('container')
    <section class="cover">
        <h1>Perpustakaan Digital</h1>
        <div class="img-cover">
            <img src="https://img.freepik.com/premium-vector/reading-hall-printed-books-university-library_157667-47.jpg?w=996" alt="Cover" width="100%" height="100%">
        </div>
    </section>

    <section class="book-list">
        <form class="d-flex justify-content-center" role="search" action="" method="get">
            <input class="form-control-lg me-2" type="text" name="judul" placeholder="Search Book ..." aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>


        <div class="row mt-5">
            <h1>Daftar Buku</h1>
        </div>
          <div class="row mt-4">
            @foreach ($book as $book)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="card border-info mb-3 h-100" style="max-width: 18rem;">
                    <div class="card-header"><h4 class="card-title">{{ $book->judul }}</h4>
                        <p class="card-text">
                            @foreach ($book->categories as $category)
                            <p class="card-text"><small class="text-body-secondary">{{ $category->namakategori }}</small></p>
                            @endforeach
                        </p>
                    </div>
                    <div class="card-body">
                      <p class="card-text">Penulis : {{ $book->penulis }}</p>
                      <p class="card-text">Penerbit : {{ $book->penerbit }}</p>
                      <p class="card-text">Tahun Terbit : {{ $book->tahunterbit }}</p>
                      <a href="{{ url('peminjaman', $book->id) }}" class="btn btn-warning">Pinjam Buku</a>
                    </div>
                  </div>
            </div>
            @endforeach

            
          </div>
    </section>
@endsection