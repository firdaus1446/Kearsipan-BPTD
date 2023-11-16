
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
                <a href="{{route ('exportarsip')}}" class="btn btn-success">Export Excel</a>
                  <div class="card-tools">
                    <form action="{{ url('searcharsip') }}" method="GET" class="form-inline">
                      <div class="input-group">
                          <input type="text" name="keyword" class="form-control" placeholder="Cari Arsip">
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-primary">Cari</button>
                          </div>
                      </div>
                  </form>
                  </div>
              </div>
              <div class="card-body">
                @include('Admin.tablearsip',$dtarsip)
            
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
<script>
  document.addEventListener('DOMContentLoaded', function () {
      const confirmDeleteButtons = document.querySelectorAll('[data-confirm-delete]');

      confirmDeleteButtons.forEach(button => {
          button.addEventListener('click', function (event) {
              event.preventDefault(); // Mencegah tindakan penghapusan default

              Swal.fire({
                  title: 'Konfirmasi Penghapusan',
                  text: 'Anda yakin ingin menghapus data ini?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#d33',
                  cancelButtonColor: '#3085d6',
                  confirmButtonText: 'Ya, Hapus',
                  cancelButtonText: 'Batal',
              }).then((result) => {
                  if (result.isConfirmed) {
                      // Jika pengguna menekan "Ya, Hapus", arahkan ke URL penghapusan
                      window.location.href = button.getAttribute('href');
                  }
              });
          });
      });
  });
</script>

</html>
