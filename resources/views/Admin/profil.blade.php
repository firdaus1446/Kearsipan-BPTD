<!DOCTYPE html>
<html lang="en">
<head>
  @include('Template.head')
</head>
<style>
  .img-container {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .img-container img {
    max-width: 300px;
    max-height: 300px;
  }
</style>
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
            <h1 class="m-0">Profil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('beranda')}}">Home</a></li>
              <li class="breadcrumb-item active">Profil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Name: {{ Auth::user()->name }}</h3>
            </div>
          </div>
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Email: {{ Auth::user()->email }}</h3>
            </div>
          </div>
          <div class="card card-info">
            <div class="card-body">
              <div class="card-body img-container">
                @if (Auth::user()->foto)
                  <img class="img-fluid" src="{{ url('image').'/' . Auth::user()->foto }}" alt="{{ Auth::user()->name }}'s Photo">
                @endif
              </div>
            </div>
          </div>
          <div class="card card-info">
            <a href="{{ url('editprofil', Auth::user()->id) }}" class="btn btn-primary"> <i class="fas fa-pencil-alt"></i>Edit</a>
          </div>
        </div>
      </div>
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
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Find all elements with the data-confirm-delete attribute
    const confirmDeleteButtons = document.querySelectorAll('[data-confirm-delete]');

    // Add event listener to each button
    confirmDeleteButtons.forEach(button => {
      button.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default delete action

        // Display SweetAlert confirmation
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
            // If user presses "Yes," proceed with deleting data
            window.location.href = button.getAttribute('href');
          }
        });
      });
    });
  });
</script>
</html>
