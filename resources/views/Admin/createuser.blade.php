
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
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('beranda')}}">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data User</li>
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
                <h3>Tambah Data User</h3>
              </div>
              <div class="card-body">
                <form action="{{route('simpanuser')}}" method="post" enctype="multipart/form-data">
                 {{ csrf_field() }}
                 <div class="form-group">
                     <input type="text" id="name" name="name" class="form-control" placeholder="Full Name">
                 </div>
                 <div class="form-group">
                     <input type="email" id="email" name="email" class="form-control" placeholder="email">
                 </div>
                 <div class="form-group">
                     <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                     <div class="form-group">
                      <th>* Wajib Masukan Gambar</th>
                      <input type="file" id="foto" name="foto" class="form-control" placeholder="Foto">
                  </div>
                 </div>
                 <div class="form-group">
                     <button type="submit" class="btn btn-success">Simpan</button>
                     <a href="{{route ('datauser')}}" class="btn btn-primary">Kembali</a>
                 </div>
                </form>
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
</body>
</html>
