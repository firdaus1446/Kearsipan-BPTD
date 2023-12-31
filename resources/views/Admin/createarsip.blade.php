
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
              <li class="breadcrumb-item active">Tambah Arsip</li>
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
                <h3>Tambah Arsip</h3>
              </div>
              <div class="card-body">
                <form action="{{route('simpanarsip')}}" method="post" enctype="multipart/form-data">
                 {{ csrf_field() }}
                 <div class="form-group">
                     <input type="text" id="kode_arsip" name="kode_arsip" class="form-control @error('kode_arsip') is-invalid @enderror" placeholder="Kode Arsip">
                     @error('kode_arsip')
                         <div class="invalid-feedback">Form Kode Arsip Harus Diisi</div>
                     @enderror
                 </div>
                 <div class="form-group">
                     <input type="text" id="informasi" name="informasi" class="form-control" placeholder="informasi">
                 </div>
                 <div class="form-group">
                     <input type="text" id="nomor" name="nomor" class="form-control" placeholder="nomor">
                 </div>
                 <div class="form-group">
                    <input type="text" id="jumlah_berkas" name="jumlah_berkas" class="form-control" placeholder="Jumlah Berkas">
                </div>
                <div class="form-group">
                    <input type="text" id="no_item" name="no_item" class="form-control" placeholder="No Item">
                </div>
                <div class="form-group">
                    <input type="text" id="isi" name="isi" class="form-control" placeholder="isi">
                </div>
                <div class="form-group">
                    <input type="date" id="kurun_waktu" name="kurun_waktu" class="form-control" placeholder="Kurun Waktu">
                </div>
                <div class="form-group">
                  <th>* Opsional Upload File (Excel, Word, PDF, PowerPoint)</th>
                  <input type="file" id="file" name="file" class="form-control" accept=".xlsx, .xls, .doc, .docx, .pdf, .ppt, .pptx">
                  @error('file')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
                <div class="form-group">
                    <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan">
                </div>
                <div class="form-group">
                    <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Lokasi">
                </div>
                 <div class="form-group">
                     <button type="submit" class="btn btn-success">Simpan</button>
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
