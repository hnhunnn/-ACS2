<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>
   <link rel="stylesheet" href="../css/dashboard.css">
   <link rel="stylesheet" href="../css/listMovie.css">
   <link rel="stylesheet" href="../css/addUser.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  {{-- icon --}}
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar - header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <li>
        <a href="#">Đăng Xuất</a>

        </li>
        </ul>
    </nav>

  <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="../img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Cinema Manager</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <!-- Quản lý người dùng -->
                <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                    Quản lý người dùng
                    </p>
                </a>
                
                </li>

                <!-- Quản lý phim -->
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-film"></i>
                    <p>
                    Quản lý phim
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{ route('admin.listMovie') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách phim</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('admin.addMovie') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm phim mới</p>
                    </a>
                    </li>
                </ul>
                </li>

                <!-- Báo cáo doanh thu -->
                <li class="nav-item">
                <a href="/admin/reports" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>Báo cáo doanh thu</p>
                </a>
                </li>
                <!-- Dashboard -->
                <li class="nav-item">
                <a href="/admin/dashboard" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Back to home</p>
                </a>
                </li>


            </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

  <!-- content -->    
    @yield('content')

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>