
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('Template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('Template.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('Template.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Arsip</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('beranda')}}">Home</a></li>
              <li class="breadcrumb-item active">Data Arsip</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="content">
            <div class="card card-info card-outline">
              <div class="card-header">
                  <div class="card-tools">
                      
                  </div>
              </div>
              <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Kode Arsip</th>
                    <th>Informasi</th>
                    <th>Nomor Berkas</th>
                    <th>Jumlah</th>
                    <th>No Item</th>
                    <th>Isi</th>
                    <th>Kurun Waktu</th>
                    <th>File</th>
                    <th>Keterangan</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>

                @foreach ($dtarsip as $item) 
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_arsip}}</td>
                    <td>{{ $item->informasi}}</td>
                    <td>{{ $item->nomor}}</td>
                    <td>{{ $item->jumlah_berkas}}</td>
                    <td>{{ $item->no_item}}</td>
                    <td>{{ $item->isi}}</td>
                    <td>{{ $item->kurun_waktu}}</td>
                    <td>{{ $item->file}}</td>
                    <td>{{ $item->keterangan}}</td>
                    <td>{{ $item->lokasi}}</td>

                    <td>
                        <a href="{{ url('editarsip',$item->id) }}" class="btn btn-primary">Edit</a>
                         
                        <a href="{{ url('deletearsip',$item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <br>
            {{ $dtarsip->links() }}
        </div>


           
          </div>
          <!-- /.col-md-6 -->
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    @include('Template.footer')
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
    @include('Template.script')
    @include('sweetalert::alert')
</body>
</html>
