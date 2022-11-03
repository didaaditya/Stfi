<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:##008B8B">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/dist/img/affh.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">STFI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="../../profile" class="d-block">{{Auth::user()->name}}</a>
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
<<<<<<< HEAD
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class ="sidebar-item {{ request()->is('excel') ? 'active' : '' }}">
                <a href="{{ route('excel.index') }}" class="sidebar-link">
                  <i class="far fa-circle nav-icon"></i>
                  <span>Dosen</span>
                </a>
              </li>

              <li class="nav-item">
                <li class ="sidebar-item {{ request()->is('absen') ? 'active' : '' }}">
                <a href="{{ route('absen.index') }}" class="sidebar-link">
                  <i class="far fa-circle nav-icon"></i>
                  <span>Absen</span>
=======
            <li class="nav-item">
                <a href="{{ url('/excel') }}" class="nav-link {{ $active === 'Dosen' ? 'active' : '' }}">
                    <p>
                        Dosen
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/absen') }}" class="nav-link {{ $active === 'Absen' ? 'active' : '' }}">
                    <p>
                        Absen
                    </p>
>>>>>>> cfde7ed483f75355c0a88c6ba3f48d20003c9898
                </a>
            </li>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
