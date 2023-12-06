<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <style>
      .center-image {
        display: block;
        margin: auto;
        opacity: 0.8;
        width: 140px;
        height: 80px;
      }
      .center-text {
      text-align: center;
    }
    </style>
    <a href="#" class="brand-link">
      <img src="{{ asset('gambar/123.png') }}" alt="Logo" class="center-image">
      <h5 class="center-text">Balai Pengelola Transportasi</h5>
      <h5 class="center-text"> Darat Kelas II</h5>
      <h5 class="center-text"> Kalimantan Selatan</h5>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="{{ Auth::user()->foto }}" class="img-circle elevation-2" alt="User Image"> --}}
            @if(Auth::user()->foto)
            @php
        $fotoPath = 'image/' . Auth::user()->foto;
        $size = getimagesize(public_path($fotoPath));
        $width = $size[0];
        $height = $size[1];
        @endphp
      <img src="{{ asset($fotoPath) }}" class="img-circle elevation-2" alt="User Image" width="{{ $width }}" height="{{ $height }}">
            @else
                <!-- Tambahkan gambar default jika tidak ada foto profil -->
                <img src="{{ asset('gambar/logo.png') }}" class="img-circle elevation-2" alt="User Image">
            @endif
        </div>
        <div class="info">
          <a href="#" class="d-block" style="font-size: 20px;">{{ Auth::user()->name }}  ( {{ Auth::user()->level }} )</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ url('beranda')}}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p>
                Akses Arsip
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route ('dataarsip')}}" class="nav-link">
                  <i class="nav-icon fas fa-book-open"></i>
                  <p>Daftar Arsip</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route ('createarsip')}}" class="nav-link">
                  <i class="nav-icon fas fa-plus-square"> </i>
                  <p>Tambah Arsip</p>
                </a>
              </li>
            </ul>
          </li>
          @if (Auth::user()->level != 'admin')
          @else
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p>
                Akses User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route ('datauser')}}" class="nav-link">
                  <i class="nav-icon fas fa-id-badge"></i>
                  <p>Data User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          
          @if (Auth::user()->level != 'pegawai')
          @else
          <li class="nav-item">
            <a href="{{ url('profil') }}" class="nav-link">
              <i class="nav-icon fas fa-id-badge"></i>
              <p>Profil</p>
            </a>
          </li>
          @endif
         
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" data-confirm-logout="true">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
        </li>
        </ul>
      </nav>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
            const confirmLogoutLinks = document.querySelectorAll('[data-confirm-logout]');
    
            confirmLogoutLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault(); // Mencegah tindakan logout default
    
                    Swal.fire({
                        title: 'Konfirmasi Logout',
                        text: 'Anda yakin ingin logout?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Logout',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Jika pengguna menekan "Ya, Logout", lakukan logout
                            window.location.href = link.getAttribute('href');
                        }
                    });
                });
            });
        });
    </script>
    
      <!-- /.sidebar-menu -->
    </div>

        
    <!-- /.sidebar -->
  </aside>