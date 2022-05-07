 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">

      </div>
    </li>

    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">

    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">

    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->



<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
  <!-- Brand Logo -->
  <a href="/home" class="brand-link">
    {{-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
    <span class="brand-text font-weight-light" style="margin-left:80px;">{{ Auth::user()->username }} </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        {{-- <img src="" class="img-circle elevation-2" alt="User Image"> --}}
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->username }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="{{ route('auth.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.html" class="nav-link active">
                <i class="fa fa-list nav-icon"></i>
                <p>View All</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('create.user') }}" class="nav-link">
                <i class="fa fa-plus-circle nav-icon" aria-hidden="true"></i>
                <p>Create User</p>
              </a>
            </li>

            <li class="nav-item">
                <a href="{{route('manage-uesers')}}" class="nav-link">
                    {{-- <i class="fa fa-sign-out-circle nav-icon" aria-hidden="true"></i> --}}
                    <i class="right fas fa-user"></i>
                    {{-- <i class="fa fa-sign-out"></i> --}}
                  <p>Manage Users</p>
                </a>
            </li>

          </ul>
        </li>

        <li class="nav-item">
            <a href="{{route('manage-post')}}" class="nav-link">
                {{-- <i class="fa fa-sign-out-circle nav-icon" aria-hidden="true"></i> --}}
                <i class="right fas fa-folder"></i>
                {{-- <i class="fa fa-sign-out"></i> --}}
              <p >Manage Post</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('manage-post')}}" class="nav-link">
                {{-- <i class="fa fa-sign-out-circle nav-icon" aria-hidden="true"></i> --}}
                <i class="right fas fa-gear"></i>
                {{-- <i class="fa fa-sign-out"></i> --}}
              <p >Setting</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{route('/logout')}}" class="nav-link">
                {{-- <i class="fa fa-sign-out-circle nav-icon" aria-hidden="true"></i> --}}
                <i class="fa fa-sign-out"></i>
                {{-- <i class="fa fa-sign-out"></i> --}}
              <p >Logout</p>
            </a>
          </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->

  </div>
  <!-- /.sidebar -->
</aside>
