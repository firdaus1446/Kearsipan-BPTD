
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Kearsipan BPTD</title>
  <link rel="shortcut icon" href="{{asset('gambar/logo3.png')}}" type="image">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
  <style>
    body {
      background-image: url("{{asset('gambar/background1.jpg')}}");
      background-size: cover; /* Untuk mengisi seluruh area body */
      background-position: center; /* Posisi gambar di tengah */
      background-repeat: no-repeat; /* Tidak mengulang gambar */
    }
    h4, h5 {
      color: white; /* Menetapkan warna teks menjadi putih */
      padding: 10px; /* Menambahkan ruang di sekitar tulisan */
      display: inline-block; /* Agar latar belakang mengelilingi teks */
      text-shadow: 6px 6px 6px #000; /* Menambahkan outline hitam pada tulisan */
    }

  </style>
  <div class="login-logo">
    <img src="{{asset('gambar/123.png')}}" alt="Logo"  style="opacity: .8 width: 150px; height: 150px;">
    <br>
    <h4>DIREKTORAT JENDERAL PERHUBUNGAN DARAT <br>
      KEMENTERIAN PERHUBUNGAN REPUBLIK INDONESIA<br>
      BALAI PENGELOLA TRANSPORTASI DARAT KELAS II KALIMANTAN SELATAN</h4>
  </div>
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login Disini</p>

      <form action="{{route('postlogin')}}" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email"  placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
@include('sweetalert::alert')
</body>
</html>
