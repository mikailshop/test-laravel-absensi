<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HRM BAKOEL CORP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ ('../../adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ ('../../adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ ('../../adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ ('../../adminlte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ ('../../adminlte/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ ('../../adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ ('../../adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ ('../../adminlte/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown{{ request()->is('Auth::user()->nama_panggilan') ? 'active' : '' }}">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->nama_panggilan }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
                </a>
            </li>
            
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link clearfix">
        <img src="../../adminlte/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .9">
        <span class="brand-text font-weight-light">HRM Bakoel Corp</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="avatar clearfix">
            <img src="{{ asset('/images/' .Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User Avatar">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->nama_lengkap }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Dashboard</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('absen') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Absen</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cuti.create') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Pengajuan Cuti</p></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('useronline') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Karyawan On Office</p>
                        </a>
                    </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/kantin" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Kantin Kejujuran
                        <span class="right badge badge-danger">New</span>
                    </p>
                    </a>
                </li>
                
                <li class="nav-header">Admin</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Manajemen Cuti
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item{{ request()->is('cuti') ? 'active' : '' }}">
                            <a href="{{ route('cuti') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>List Karyawan Cuti</p></a>
                        </li>
                        <li class="nav-item{{ request()->is('total-cuti') ? 'active' : '' }}">
                            <a href="{{ route('total-cuti') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Total List Cuti</p></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Manajemen User
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Data User</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Biodata User Lengkap</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">SuperAdmin</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Manajement System
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('department') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Department</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('jabatan') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Jabatan</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gaji') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Gaji</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('shift') }}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Shift</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('alert')
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
        <b>HambaDhoifz</b>
        </div>
        <strong>Copyright &copy; 2020 <a href="http://adminlte.io">AdminHRD.Bakoel.Corp</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{ ('../../adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ ('../../adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ ('../../adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ ('../../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- ChartJS -->
    <script src="{{ ('../../adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ ('../../adminlte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ ('../../adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ ('../../adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ ('../../adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ ('../../adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ ('../../adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ ('../../adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ ('../../adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ ('../../adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ ('../../adminlte/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ ('../../adminlte/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ ('../../adminlte/js/demo.js') }}"></script>
</body>
</html>
