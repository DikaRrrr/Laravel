@extends('layouts.main')

@section('container')

    <div class="row justify-content-center">
        <div class="col-lg-6">
          <main class="form-registration w-100 m-auto">
            <form action="/register" method="POST">
                @csrf
                <h1 class="h3 mb-5 fw-normal text-center">Perpustakaan Digital Register</h1>
            
                <div class="form-floating">
                  <input type="text" name="username" class="form-control rounded-top @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                  <label for="username">Username</label>
                  @error('username')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email</label>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="text" name="namalengkap" class="form-control @error('namalengkap') is-invalid @enderror" id="namalengkap" placeholder="NamaLengkap" required value="{{ old('namalengkap') }}">
                    <label for="namalengkap">Nama Lengkap</label>
                    @error('namalengkap')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="text" name="alamat" class="form-control rounded-bottom @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" required value="{{ old('alamat') }}">
                    <label for="alamat">Alamat</label>
                    @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>

                <small class="d-block text-center mt-3">Sudah Punya Akun? <a href="/login">Login Sekarang!</a></small>

                <p class="d-flex mt-4 mb-3 text-body-secondary justify-content-end">&copy; 2024</p>
              </form>
            </main>
        </div>
    </div>
@endsection