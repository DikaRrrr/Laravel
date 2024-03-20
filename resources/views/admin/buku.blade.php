<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin | {{ $title }}</title>
    <!-- Required meta tags -->
    @include('admin.css')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .div_center {
            text-align: center;
            margin-bottom: 40px;
        }

        .h2_font {
            padding-bottom: 20px;
            margin-top: 20px; 
        }

        .center {
          margin: auto;
          width: 50%;
          text-align: center;
          border: 1px solid grey;
          color: grey;
        }

        .text_color {
            color: black:
        }

        label {
            display: inline-block;
            width: 200px
        }

        .div_design {
            padding-bottom: 15px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

              @if (session()->has('addSuccess'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session('addSuccess') }}
              </div>
              @endif

              @if (session()->has('deleteSuccess'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session('deleteSuccess') }}
              </div>
              @endif

              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                        
                    @endforeach
                </ul>
              </div>
                  
              @endif

              <form action="/store_book" method="POST">
                  @csrf
                <div class="div_center">
                    <h2 class="h2_font">Tambah Buku</h2>

                    <div class="div_design">
                        <label for="">Judul : </label>
                        <input type="text" name="judul" placeholder="Masukan Judul Buku">
                    </div>

                    <div class="div_design">
                        <label for="">Penulis :</label>
                        <input type="text" name="penulis" placeholder="Masukan Penulis Buku">
                    </div>

                    <div class="div_design">
                        <label for="">Penerbit : </label>
                        <input type="text" name="penerbit" placeholder="Masukan Penerbit Buku">
                    </div>

                    <div class="div_design">
                        <label for="">Tahun Terbit :</label>
                        <input type="number" name="tahunterbit" placeholder="Masukan Tahun Terbit">
                    </div>

                    <div class="div_design">
                        <label for="">Kategori Buku :</label>
                        <select name="categories" id="catagory" required>
                            <option value="" selected>Add category</option>
                            @foreach ($catagory as $catagory)
                                <option value="{{ $catagory->id }}">{{ $catagory->namakategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
                </div>

                <div class="table-responsive">
                    <table class="table mt-4">
                      <a href="buku_export" class="btn btn-success">Generate Laporan</a>
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th> ID </th>
                          <th> Judul </th>
                          <th> Penulis </th>
                          <th> Penerbit </th>
                          <th> Tahun Terbit </th>
                          <th> Kategori </th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($book as $book)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->judul }}</td>
                            <td>{{ $book->penulis }}</td>
                            <td>{{ $book->penerbit }}</td>
                            <td>{{ $book->tahunterbit }}</td>
                            <td>
                              @foreach ($book->categories as $category)
                                  {{ $category->namakategori }}
                              @endforeach
                            </td>
                            <td>
                                  <a href="{{ url('update_book',$book->id) }}" class="btn btn-primary">Edit</a>
                                  <a class="btn btn-danger" href="{{ url('delete_book',$book->id) }}" onclick="return confirm('Apakah anda yakin akan menghapus Buku ini ?')">Delete</a>
                            </td>

                        
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                  


            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  </body>
</html>