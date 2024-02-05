<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin | {{ $title }}</title>
    <!-- Required meta tags -->
    @include('admin.css')

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
                        <select name="catagory" required>
                            <option value="" selected>Add category</option>
                            @foreach ($catagory as $catagory)
                                <option value="">{{ $catagory->namakategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
                </div>

                <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
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
                        <tr>
                          <td> 02312 </td>
                          <td> $14,500 </td>
                          <td> Dashboard </td>
                          <td> Credit card </td>
                          <td> 04 Dec 2019 </td>
                          <td>Kategori</td>
                          <td>
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Hapus</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>


            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>