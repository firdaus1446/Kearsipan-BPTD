
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
              <li class="breadcrumb-item active">Edit Arsip</li>
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
                <h3>Edit Arsip</h3>
              </div>
              <div class="card-body">
                <form action="{{ url('updatearsip',$arsip->id )}}" method="post" enctype="multipart/form-data">
                 {{ csrf_field() }}
                 <th>Kode Arsip</th>
                 <div class="form-group">
                     <input type="text" id="kode_arsip" name="kode_arsip" class="form-control" placeholder="Kode Arsip" value="{{ $arsip->kode_arsip }}">
                 </div>
                 <th>Informasi</th>
                 <div class="form-group">
                     <input type="text" id="informasi" name="informasi" class="form-control" placeholder="informasi" value="{{ $arsip->informasi }}">
                 </div>
                 <th>Nomor</th>
                 <div class="form-group">
                     <input type="text" id="nomor" name="nomor" class="form-control" placeholder="nomor" value="{{ $arsip->nomor }}">
                 </div>
                 <th>Jumlah Berkas</th>
                 <div class="form-group">
                    <input type="text" id="jumlah_berkas" name="jumlah_berkas" class="form-control" placeholder="Jumlah" value="{{ $arsip->jumlah_berkas }}">
                </div>
                <th>No Item</th>
                <div class="form-group">
                    <input type="text" id="no_item" name="no_item" class="form-control" placeholder="No Item" value="{{ $arsip->no_item }}">
                </div>
                <th>Isi</th>
                <div class="form-group">
                    <input type="text" id="isi" name="isi" class="form-control" placeholder="isi" value="{{ $arsip->isi }}">
                </div>
                <th>Kurun Waktu</th>
                <div class="form-group">
                    <input type="date" id="kurun_waktu" name="kurun_waktu" class="form-control" placeholder="Kurun Waktu" value="{{ $arsip->kurun_waktu }}">
                </div>
                <th>File </th><th>{{ $arsip->file }}</th>
                <div class="form-group">
                    <input type="file" id="file" name="file" class="form-control" placeholder="File">
                </div>
                <th>Keterangan</th>
                <div class="form-group">
                    <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" value="{{ $arsip->keterangan }}">
                </div>
                <th>Lokasi</th>
                <div class="form-group">
                    <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Lokasi" value="{{ $arsip->lokasi }}">
                </div>
                 <div class="form-group">
                     <button type="submit" class="btn btn-success">Simpan</button>
                     <a href="{{route ('dataarsip')}}" class="btn btn-primary">Kembali</a>
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
