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
                  
                  
                <div class="div_center">
                    <h2 class="h2_font">Add Catagory</h2>
                    <form action="/add_catagory" method="POST">
                      @csrf
                        <input type="text" name="catagory" placeholder="Nama Kategori">

                        <button class="btn btn-primary" type="submit">Add</button>
                    </form>
                </div>

                <table class="center">
                  
                      
                  
                  <tr>
                    <th>Kategori</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    @foreach ($data as $data)

                    <td>{{ $data->namakategori }}</td>
                    <td><a class="btn btn-danger" href="{{ url('delete_catagory',$data->id) }}" onclick="return confirm('Apakah anda yakin akan menghapus Kategori ini ?')">Delete</a></td>
                  </tr>

                  @endforeach
                </table>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>