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
                <div class="row ">
                    <div class="col-12 grid-margin">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Data Users</h4>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th> ID</th>
                                  <th> Username </th>
                                  <th> Email </th>
                                  <th> Nama Lengkap </th>
                                  <th> Alamat </th>
                                  <th> Posisi </th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($user as $user)
                                <tr>
                                  <td> {{ $user->id }} </td>
                                  <td> {{ $user->username }} </td>
                                  <td> {{ $user->email }} </td>
                                  <td> {{ $user->namalengkap }}</td>
                                  <td> {{ $user->alamat }} </td>
                                  <td>{{ $user->posisi }}</td>
                                </tr>
                              </tbody>
                              @endforeach
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
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