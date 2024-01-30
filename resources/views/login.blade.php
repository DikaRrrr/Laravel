@extends('layouts.main')

@section('container')




    <div class="row justify-content-center">
        <div class="col-lg-6">
          @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if (session()->has('LoginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('LoginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <main class="form-signin w-100 m-auto">
            <form action="/login" method="POST">
              @csrf
                <h1 class="h3 mb-5 fw-normal text-center">Perpustakaan Digital Login</h1>
            
                <div class="form-floating">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                  <label for="email">Email</label>
                  @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-floating">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                  <label for="password">Password</label>
                </div>
            

                <button class="btn btn-primary w-100 py-2" type="submit">Login</button>

                <small class="d-block text-center mt-3">Belum Punya Akun? <a href="/register">Daftar Sekarang!</a></small>

                <p class="d-flex mt-4 mb-3 text-body-secondary justify-content-end">&copy; 2024</p>
              </form>
            </main>
        </div>
    </div>
@endsection