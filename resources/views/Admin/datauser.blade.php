
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
            <h1 class="m-0">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('beranda')}}">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
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
                      <a href="{{route ('createuser')}}" class="btn btn-success">  Tambah User   <i class="fas fa-plus-square"></i></a>
                  </div>
              </div>
              <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>

                @foreach ($dtuser as $item => $items) 
                <tr>
                    <td>{{ $dtuser->firstItem() + $item }}</td>
                    <td>{{ $items->name}}</td>
                    <td>{{ $items->email}}</td>
                    <td>
                      @if ($items->foto)
                        <img style="max-width:75px;max-height:75px" src="{{ url('image').'/'.$items->foto }}"/>
                          
                      @endif
                    </td>
                    <td>{{ $items->level}}</td>

                    <td>
                        <a href="{{ url('edituser',$items->id) }}" class="btn btn-primary">Edit</a>
                        {{-- <a href="{{ url('deleteuser',$item->id) }}" class="btn btn-danger delete">Delete</a> --}}
                        <a href="{{ url('deleteuser', $items->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                        {{-- <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a> --}}


                    </td>
                </tr>
                @endforeach
            </table>
            <br>
            {{ $dtuser->links() }}
        </div>
            <div class="card-footer">

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
{{-- <script>
            $('.delete').click( function(){
              // var nameid = $(this).attr($item->name)
              Swal.fire({
            title: 'Yakin ?',
            text: "Kamu Menghapus User Ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          });
            });
</script> --}}
</html>
