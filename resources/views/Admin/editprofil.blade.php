
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
            <h1 class="m-0">Edit Profil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('beranda')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Profil</li>
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
              </div>
              <div class="card-body">
                <form action="{{ url('updateprofil',$us->id )}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <th>Name</th>
                 <div class="form-group">
                     <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ $us->name }}">
                     @error('name')
                     <div class="invalid-feedback">Form Name Harus Diisi</div>
                 @enderror
                    </div>
                 <th>Email</th>
                 <div class="form-group">
                     <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{ $us->email }}">
                     @error('email')
                     <div class="invalid-feedback">Form Email Harus Diisi</div>
                 @enderror
                    </div>
                 @if ($us->foto)
                <div class="mb-3">
                  <img style="max-width:100px;max-height:100px" src="{{ url('image').'/'.$us->foto}}"/>
                </div>
            @endif
            <div class="form-group">
              <th>Masukan Gambar</th>
              <input type="file" id="foto" name="foto" class="form-control" placeholder="image">
          </div>
        </select>
                 <div class="form-group">
                     <button type="submit" class="btn btn-success">Simpan</button>
                     <a href="{{route ('profil')}}" class="btn btn-primary">Kembali</a>
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
